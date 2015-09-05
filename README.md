## The what

Feed JSONator a valid json schema document (draft 4) and it spits out a json document of randomly generated mock data. The random data is powered by [faker](https://github.com/fzaninotto/Faker).

## Cool, but how do you use it?

Glad you asked! It's pretty simple.

```
<?php

require_once __DIR__.'/vendor/autoload.php';

// It is important to json_decode your schema into a stdClass object
$schema = json_decode(file_get_contents('schema.json'));

// {
//     "title": "Example Schema",
//     "type": "object",
//     "properties": {
//         "firstName": {
//             "type": "string"
//         },
//         "lastName": {
//             "type": "string"
//         }
//     }
// }

$traverser = new JSONator\Traverser;
$jsonGenerator = new JSONator\Generator($traverser);

$json = $jsonGenerator->generate($schema);

// {
//     "firstName": "Atque",
//     "lastName": "Officiis"
// }
```

## To-do

The project is very much a work in progress and there is plenty to do!

- Custom keywords that expose more of the power of [faker](https://github.com/fzaninotto/Faker)
- Support more way more keywords. Find a list of currently supported ones below.
- Improve test coverage!
- Attempt to infer types if none are provided

## Supported keywords

    - properties
    - required
    - items
    - minLength
    - maxLength
    - pattern
    - enum
