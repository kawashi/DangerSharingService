<?php

namespace Fuel\Tasks;

class Rest
{
    const CONFIG_GROUP = 'GENERATE_TASK';

    /**
     * @param string[] `a:b`形式の文字列の配列
     * @return array[array] 'a' => 'b'形式の連想配列
     */
    private function parseCoronArgs(array $args) {
        $ret = array();
        foreach($args as $arg) {
            list($key, $val) = explode(':', $arg);
            $ret[$key] = $val;
        }

        return $ret;
    }

    public function help() {
        echo "\n===========================================";
        echo "\nGenerate task help";
        echo "\n";
        echo "\nCommand: oil refine generate(:task)";
        echo "\n";
        echo "\rest         [name] --format --prefix=api (<methodName:httpMethod> ...)";
        echo "\rest:help";
        echo "\n-------------------------------------------\n\n";
    }

    /**
     * This method gets ran when a valid method name is not used in the command.
     *
     * Usage (from command line):
     *
     * php oil r rest
     *
     * @return string
     */
    public function run($name)
    {
        echo "\n===========================================";
        echo "\nRunning task [Rest]";
        echo "\n-------------------------------------------\n";

        $format = \Cli::option('format');
        $prefix = \Cli::option('prefix', 'api');
        $opts = $this->parseCoronArgs(array_slice(func_get_args(), 1));

        echo "Add to app/config/routes.php\n";
        echo "\t".\Cli::color("$prefix/$name/(:num) => $prefix/$name/index/\$1", 'green')."\n\n";

        // ルーティングをロード
        // /$name/:numのルーティングを上書き
        \Config::load('routes', Rest::CONFIG_GROUP, true);
        \Config::set(Rest::CONFIG_GROUP.".$prefix/$name/(:num)", "$prefix/$name/index/\$1");
        \Config::save('routes', Rest::CONFIG_GROUP);

        // コード生成の用意
        $name = strtolower($name);
        $names = \Inflector::pluralize($name);
        $capital_prefix = ucfirst($prefix);
        $capital_name = ucfirst($name);
        $model = \Inflector::words_to_upper("model_$name");

        $format = is_null($format) ? '' : "protected \$format = '$format';\n";

        // custom methods
        $methods = array();
        $docs = array();
        foreach($opts as $methodName => $httpMethod) {
            $upper_http = strtoupper($httpMethod);

            array_push($methods, <<<METHOD

	/**
	 * {$upper_http} /{$prefix}/{$name}/{$methodName}
	 */
	public function {$httpMethod}_{$methodName}()
	{

	}
METHOD
            );
            array_push($docs, <<<DOC
 * {$upper_http} /{$prefix}/{$name}/{$methodName} => {$httpMethod}_{$methodName}()
DOC
            );
        }

        if(count($docs)) array_unshift($docs, " *\n * User defined methods:");
        $optionalMethod = implode("\n", $methods);
        $optionalDocs = implode("\n", $docs);

        $content = <<<CONTROLLER
<?php

class Controller_{$capital_prefix}_{$capital_name} extends Controller_Rest
{
	{$format}
{$optionalMethod}
}

CONTROLLER;

        // 保存
        $base = APPPATH.'classes'.DS.'controller';
        $path = $base.DS.$prefix;
        if(!file_exists($path)) {
            \File::create_dir($base, $prefix);
            echo "Create directory $prefix...\n";
            echo "\t".\Cli::color($path.DS, 'green')."\n";
        }

        \File::create($path, $name.'.php', $content);

        echo "Generate controller...\n";
        echo "\t".\Cli::color($path.DS.$name.'.php', 'green')."\n";
    }
}