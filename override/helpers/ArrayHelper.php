<?php

namespace app\override\helpers;


class ArrayHelper extends \yii\helpers\ArrayHelper
{
    /**
     * Brian override: this arrayhelper does not use AR's fields() to generate array, instead it pulls all attributes
     * This is because REST api pulls only a specific set of fields, defined in AR's fields()
     *
     * Converts an object or an array of objects into an array.
     * @param object|array|string $object the object to be converted into an array
     * @param array $properties a mapping from object class names to the properties that need to put into the resulting arrays.
     * The properties specified for each class is an array of the following format:
     *
     * ```php
     * [
     *     'app\models\Post' => [
     *         'id',
     *         'title',
     *         // the key name in array result => property name
     *         'createTime' => 'created_at',
     *         // the key name in array result => anonymous function
     *         'length' => function ($post) {
     *             return strlen($post->content);
     *         },
     *     ],
     * ]
     * ```
     *
     * The result of `ArrayHelper::toArray($post, $properties)` could be like the following:
     *
     * ```php
     * [
     *     'id' => 123,
     *     'title' => 'test',
     *     'createTime' => '2013-01-01 12:00AM',
     *     'length' => 301,
     * ]
     * ```
     *
     * @param boolean $recursive whether to recursively converts properties which are objects into arrays.
     * @return array the array representation of the object
     */
    public static function toArray($object, $properties = [], $recursive = true)
    {
        if (is_array($object)) {
            if ($recursive) {
                foreach ($object as $key => $value) {
                    if (is_array($value) || is_object($value)) {
                        $object[$key] = static::toArray($value, $properties, true);
                    }
                }
            }
            
            return $object;
        } elseif (is_object($object)) {
            if (!empty($properties)) {
                $className = get_class($object);
                if (!empty($properties[$className])) {
                    $result = [];
                    foreach ($properties[$className] as $key => $name) {
                        if (is_int($key)) {
                            $result[$name] = $object->$name;
                        } else {
                            $result[$key] = static::getValue($object, $name);
                        }
                    }
                    
                    return $recursive ? static::toArray($result, $properties) : $result;
                }
            }
            // if ($object instanceof Arrayable) {
            //     $result = $object->toArray([], [], $recursive);
            // } else {
                $result = [];
                foreach ($object as $key => $value) {
                    $result[$key] = $value;
                }
            // }
            
            return $recursive ? static::toArray($result, $properties) : $result;
        } else {
            return [$object];
        }
    }
}