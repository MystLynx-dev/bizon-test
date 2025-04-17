<?php
/*
	task
	1. Напишите функцию подготовки строки, которая заполняет шаблон данными из указанного объекта
	2. Пришлите код целиком, чтобы можно его было проверить
	3. Придерживайтесь code style текущего задания
	4. По необходимости - можете дописать код, методы
	5. Разместите код в гите и пришлите ссылку
*/

/**
 * Класс для работы с API
 *
 * @author		User Name
 * @version		v.1.0 (dd/mm/yyyy)
 */
class Api
{
	public function __construct()
	{

	}


	/**
	 * Заполняет строковый шаблон template данными из объекта object
	 *
	 * @author		User Name
	 * @version		v.1.0 (dd/mm/yyyy)
	 * @param		array $array
	 * @param		string $template
	 * @return		string
	 */
	public function get_api_path(array $array, string $template) : string
	{
		/* Здесь ваш код */
        return strtr($template, [
            '%id%' => $array['id'],
            '%name%' => $array['name'],
            '%role%' => $array['role'],
            '%salary%' => $array['salary']
        ]);
	}


    public function compare_objects($obj1, $obj2): string
    {
        return $obj1 === $obj2 ? 'Объекты идентичны' : 'Объекты не совпадают';
    }
}

$user =
[
	'id'		=> 20,
	'name'		=> 'John Dow',
	'role'		=> 'QA',
	'salary'	=> 100
];

$api_path_templates =
[
	"/api/items/%id%/%name%",
	"/api/items/%id%/%role%",
	"/api/items/%id%/%salary%"
];

$api = new Api();

$api_paths = array_map(static function ($api_path_template) use ($api, $user)
{
	return $api->get_api_path($user, $api_path_template);
}, $api_path_templates);

echo json_encode($api_paths, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE) . PHP_EOL;

$expected_result = ['/api/items/20/John Dow','/api/items/20/QA','/api/items/20/100'];

echo $api->compare_objects($api_paths, $expected_result) . PHP_EOL;
