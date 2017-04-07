FormRenderer
===============
2017-04-07



This planet helps rendering a form, based on an array.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



[![form.png](https://s19.postimg.org/9dedxxfc3/form.png)](https://postimg.org/image/mubcgspnj/)


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import FormRenderer
```

Or just download it and place it where you want otherwise.




Howto
============


This object needs to be prepared with a formatted array, called the model.

Documentation on the array format can be found here: https://github.com/lingtalfi/form-modelization.


Then, you can just use the following example snippet as a starting point:


```php
<?php


use FormRenderer\FormRenderer;

$model = [
     'form' => [
         'htmlAttributes' => [
             'action' => "",
             'method' => "POST",
         ],
         'messages' => [
             ["The item has been successfully recorded", "success"],
             ["The item has been successfully recorded", "warning"],
             ["The item has been successfully recorded", "info"],
             ["The item has been successfully recorded", "error"],
         ],
         "formErrorPosition" => "control",
         "displayFirstErrorOnly" => true,
     ],
    
     'order' => [
         'groupTwo',
         'groupOne',
         'submit',
     ],
     'groups' => [
         'groupOne' => [
             'label' => "About you",
             'children' => [
                 'name',
                 'age',
             ],
         ],
         'groupTwo' => [
             'label' => "About your favorite sports",
             'children' => [
                 'favorite_sports',
                 'favorite_color',
                 'country',
                 'groupThree',
             ],
         ],
         'groupThree' => [
             'label' => "Some other fields",
             'children' => [
                 'towns',
                 'message',
                 'avatar',
             ],
         ],
     ],
     'controls' => [
         "name" => [
             'label' => 'Name',
             'type' => 'input',
             'htmlAttributes' => [
                 'name' => 'name',
                 'type' => 'text',
                 'value' => '',
                 'placeholder' => 'Type your name',
             ],
             'hint' => 'Your name is used to identify you',
             /**
              *
              * A setting at the widget level determines whether or not only the first error message should be
              * displayed, or all error messages.
              * Also, there will be some "trick" to grab all error messages and display them in a centralized place
              * rather than on a per control basis, also depending on a widget level setting.
              *
              */
             'errors' => [
                 "The name must contain at least 5 chars",
                 "The name must not be empty",
             ],
         ],
         "age" => [
             'type' => 'input',
             'label' => 'Age',
             'htmlAttributes' => [
                 'name' => 'age',
                 'type' => 'text',
                 'value' => '38',
             ],
             'errors' => [],
         ],
         "favorite_sports" => [
             'type' => 'input',
             'labelLeftSide' => false,
             'label' => "What's your favorite sport?",
             'htmlAttributes' => [
                 'name' => 'favorite_sports[]',
                 'type' => 'checkbox',
             ],
             'value' => ["karate", "judo"],
             'items' => [
                 'karate' => "Karaté", // each item contains two entries: label, value
                 'judo' => "Judo",
                 'kungfu' => "Kung Fu",
             ],
             'errors' => [],
         ],
         "favorite_color" => [
             'type' => 'input',
             'labelLeftSide' => false,
             'label' => "What's your favorite color?",
             'htmlAttributes' => [
                 'name' => 'favorite_color',
                 'type' => 'radio',
             ],
             'value' => "red",
             'items' => [
                 'red' => "Red",
                 'blue' => "Blue",
                 'green' => "Green",
             ],
             'errors' => [],
         ],
         "country" => [
             'type' => 'select',
             'label' => "Country",
             'htmlAttributes' => [
                 "name" => "country",
             ],
             'value' => "spain",
             'items' => [
                 'france' => "France",
                 'spain' => "Spain",
                 'italy' => "Italy",
             ],
             'errors' => [],
         ],
         "towns" => [
             'type' => 'select',
             'label' => "Towns you've lived in",
             'htmlAttributes' => [
                 "name" => "towns",
                 "multiple",
             ],
             'value' => ["chartres", "tours"],
             'items' => [
                 'chartres' => "Chartres",
                 'tours' => "Tours",
                 'orleans' => "Orléans",
             ],
             'errors' => [],
         ],
         "message" => [
             'type' => 'textarea',
             'label' => "What's your message",
             'htmlAttributes' => [
                 "name" => "message",
             ],
             'value' => "Hello",
             'errors' => [],
         ],
         "avatar" => [
             'type' => 'input',
             'label' => 'Avatar',
             'htmlAttributes' => [
                 'name' => 'avatar',
                 'type' => 'file',
             ],
             'errors' => [],
         ],
         "submit" => [
             'type' => 'input',
             'htmlAttributes' => [
                 'name' => 'form_posted',
                 'type' => 'submit',
                 'value' => 'Send',
             ],
         ],
     ],
    ];

echo FormRenderer::create()->prepare($model)->render();
```



History Log
------------------

- 1.0.0 -- 2017-04-07

    - initial commit