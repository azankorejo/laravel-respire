<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuration For Password
    |--------------------------------------------------------------------------
    |
    | Configure password options.
    |
    */
  "password" => [
      /*
     |--------------------------------------------------------------------------
     | Add tables to check for expiration of passwords
     |--------------------------------------------------------------------------
     |
     | You can write multiple tables paths and add the functionality of respire
     | at multiple models easily.
     |
     | The default is User Model but change as you want.
     |
     */

     "tables" => ["users"],

      /*
      |--------------------------------------------------------------------------
      | Change Expiration Time By Days, Hours, Minutes and even Seconds
      |--------------------------------------------------------------------------
      |
      | You can anything anything from here in the format given below.
      |
      | year : Year is by default the current year.
      | Days : For Days simply type the number of days.
      | Hours : For Hours simply type the number of hours[eg 1-24].
      | Minutes : For Minutes simply type the number of minutes[eg 1-60].
      | Seconds : For Seconds simply type the number of seconds[eg 1-60].
      |
      |warning : Strictly follow the above rules, or you will face a ERROR !!
      */

      "time" => [
          "days" => 30,
          "hours" => 0,
          "minutes" => 0,
          "seconds" => 0,
      ],

      "redirectionPath" => 'login',
      /*
    |--------------------------------------------------------------------------
    | Enable and Disable the whole package
    |--------------------------------------------------------------------------
    |
    | If there arises a situation where you need to stop using this package
    | for some time, or you want to use it later than simply just convert
    | the status to false.
    |
    */

          "status" => true,
  ],
  "sanctum-token" => [
        /*
       |--------------------------------------------------------------------------
       | Add Custom Token Table
       |--------------------------------------------------------------------------
       |
       | Add Custom Token Table otherwise the default is sanctum provided
       |
       */

        "table" => "default",

        /*
        |--------------------------------------------------------------------------
        | Change Expiration Time By Days, Hours, Minutes and even Seconds
        |--------------------------------------------------------------------------
        |
        | You can anything anything from here in the format given below.
        |
        | year : Year is by default the current year.
        | Days : For Days simply type the number of days.
        | Hours : For Hours simply type the number of hours[eg 1-24].
        | Minutes : For Minutes simply type the number of minutes[eg 1-60].
        | Seconds : For Seconds simply type the number of seconds[eg 1-60].
        |
        |warning : Strictly follow the above rules, or you will face a ERROR !!
        */

        "time" => [
            "days" => 30,
            "hours" => 0,
            "minutes" => 0,
            "seconds" => 0,
        ],
      "redirectionPath" => 'login',
      /*
    |--------------------------------------------------------------------------
    | Enable and Disable the whole package
    |--------------------------------------------------------------------------
    |
    | If there arises a situation where you need to stop using this package
    | for some time, or you want to use it later than simply just convert
    | the status to false.
    |
    */

    "status" => true,
    ],
];
