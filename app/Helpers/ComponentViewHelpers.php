<?php

/**
 * modal componen
 */
function modal()
{
    /**
     * load view modal
     */
    if (globalAttribute()['uriSegment3'] != null) :
        if (is_numeric(globalAttribute()['uriSegment2'])) :
            return 'panel.' . globalAttribute()['uriSegment1'] . '.' . globalAttribute()['uriSegment2'] . '.modal.' . globalAttribute()['uriSegment2'];
        else :
            return 'panel.' . globalAttribute()['uriSegment1'] . '.' . globalAttribute()['uriSegment2'] . '.modal.' . globalAttribute()['uriSegment3'];
        endif;
    elseif (globalAttribute()['uriSegment2'] == null) :
        return 'panel.' . globalAttribute()['uriSegment1'] . '.modal.' . globalAttribute()['uriSegment1'];
    else :
        if (is_numeric(globalAttribute()['uriSegment2'])) :
            return 'panel.' . globalAttribute()['uriSegment1'] . '.modal.' . globalAttribute()['uriSegment1'];
        else :
            return 'panel.' . globalAttribute()['uriSegment1'] . '.' . globalAttribute()['uriSegment2'] . '.modal.' . globalAttribute()['uriSegment2'];
        endif;
    endif;
}

/**
 * js componen
 */
function js()
{
    /**
     * load view js
     */
    if (globalAttribute()['uriSegment3'] != null || globalAttribute()['uriSegment3'] != "") :
        if (is_numeric(globalAttribute()['uriSegment3'])) :
            $arr = [
                "js" => 'assets/js/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment2'] . '/' . globalAttribute()['uriSegment2'],
                "plugin" => 'assets/js/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment2'] . '/' . globalAttribute()['uriSegment2'] . '-plugin'
            ];
        else :
            $arr = [
                "js" => 'assets/js/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment2'] . '/' . globalAttribute()['uriSegment3'] . '/' . globalAttribute()['uriSegment3'],
                "plugin" => 'assets/js/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment2'] . '/' . globalAttribute()['uriSegment3'] . '/' . globalAttribute()['uriSegment3'] . '-plugin'
            ];
        endif;
    elseif (globalAttribute()['uriSegment2'] != null || globalAttribute()['uriSegment2'] != "") :
        if (is_numeric(globalAttribute()['uriSegment2'])) :
            $arr = [
                "js" => 'assets/js/src/panel/' . globalAttribute()['uriSegment1'] .  '/' . globalAttribute()['uriSegment1'],
                "plugin" => 'assets/js/src/panel/' . globalAttribute()['uriSegment1'] .  '/' . globalAttribute()['uriSegment1'] . '-plugin'

            ];
        else :
            $arr = [
                "js" => 'assets/js/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment2'] . '/' . globalAttribute()['uriSegment2'],
                "plugin" => 'assets/js/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment2'] . '/' . globalAttribute()['uriSegment2'] . '-plugin'
            ];
        endif;
    else :
        $arr = [
            "js" => 'assets/js/src/panel/' . globalAttribute()['uriSegment1'] .  '/' . globalAttribute()['uriSegment1'],
            "plugin" => 'assets/js/src/panel/' . globalAttribute()['uriSegment1'] .  '/' . globalAttribute()['uriSegment1'] . '-plugin'
        ];
    endif;

    return $arr;
}

/**
 * js component auth
 */
function jsAuth()
{
    /**
     * load view js
     */
    if (globalAttribute()['uriSegment1'] == null) :
        $arr = [
            "js" => 'assets/js/src/auth/login/login',
            "plugin" => 'assets/js/src/auth/login/login-plugin'
        ];
    else :
        $arr = [
            "js" => 'assets/js/src/auth/' . globalAttribute()['uriSegment1'] .  '/' . globalAttribute()['uriSegment1'],
            "plugin" => 'assets/js/src/auth/' . globalAttribute()['uriSegment1'] .  '/' . globalAttribute()['uriSegment1'] . '-plugin'
        ];
    endif;
    return $arr;
}

/**
 * table componen
 */
function table()
{
    /**
     * load view table
     */
    if (globalAttribute()['uriSegment3'] != null) :
        if (is_numeric(globalAttribute()['uriSegment2'])) :
            return 'panel.' . globalAttribute()['uriSegment1'] . '.' . globalAttribute()['uriSegment2'] . '.table.' . globalAttribute()['uriSegment2'];
        else :
            return 'panel.' . globalAttribute()['uriSegment1'] . '.' . globalAttribute()['uriSegment2'] . '.table.' . globalAttribute()['uriSegment3'];
        endif;
    elseif (globalAttribute()['uriSegment2'] == null) :
        return 'panel.' . globalAttribute()['uriSegment1'] . '.table.' . globalAttribute()['uriSegment1'];
    else :
        if (is_numeric(globalAttribute()['uriSegment2']) || globalAttribute()['uriSegment1'] == "cara-pakai") :
            return 'panel.' . globalAttribute()['uriSegment1'] . '.table.' . globalAttribute()['uriSegment1'];
        else :
            return 'panel.' . globalAttribute()['uriSegment1'] . '.' . globalAttribute()['uriSegment2'] . '.table.' . globalAttribute()['uriSegment2'];
        endif;
    endif;
}

/**
 * custom table componen
 */
function customTable($param1, $param2, $param3 = null)
{
    /**
     * load view table
     */
    if ($param3 != null) :
        return 'panel.' . $param1 . '.' . $param2 . '.table.' . $param3;
    elseif ($param2 == null) :
        return 'panel.' . $param1 . '.table.' . $param1;
    else :
        return 'panel.' . $param1 . '.table.' . $param2;
    endif;
}


/**
 * form componen
 */
function form()
{
    /**
     * load view form
     */
    if (globalAttribute()['uriSegment3'] != null) :
        if (is_numeric(globalAttribute()['uriSegment2'])) :
            return 'panel.' . globalAttribute()['uriSegment2'] . '.' . globalAttribute()['uriSegment2'] . '.form.' . globalAttribute()['uriSegment2'];
        else :
            return 'panel.' . globalAttribute()['uriSegment2'] . '.' . globalAttribute()['uriSegment2'] . '.form.' . globalAttribute()['uriSegment3'];
        endif;
    elseif (globalAttribute()['uriSegment2'] == null) :
        return 'panel.' . globalAttribute()['uriSegment1'] . '.form.' . globalAttribute()['uriSegment1'];
    else :
        if (is_numeric(globalAttribute()['uriSegment2'])) :
            return 'panel.' . globalAttribute()['uriSegment2'] . '.form.' . globalAttribute()['uriSegment2'];
        else :
            return 'panel.' . globalAttribute()['uriSegment1'] . '.' . globalAttribute()['uriSegment2'] . '.form.' . globalAttribute()['uriSegment2'];
        endif;
    endif;
}

/**
 * custom form componen
 */
function customForm($param1, $param2, $param3 = null)
{
    /**
     * load view form
     */
    if ($param3 != null) :
        return 'panel.' . $param1 . '.' . $param2 . '.form.' . $param3;
    elseif ($param2 == null) :
        return 'panel.' . $param1 . '.form.' . $param1;
    else :
        return 'panel.' . $param1 . '.form.' . $param2;
    endif;
}

/**
 * css componenr
 */
function css()
{
    /**
     * load view css
     */
    if (globalAttribute()['uriSegment3'] != null || globalAttribute()['uriSegment3'] != "") :
        if (is_numeric(globalAttribute()['uriSegment3'])) :
            $arr = [
                "css" => 'assets/css/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment2'] . '/' . globalAttribute()['uriSegment2'],
                "plugin" => 'assets/css/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment2'] . '/' . globalAttribute()['uriSegment2'] . '-plugin'
            ];
        else :
            $arr = [
                "css" => 'assets/css/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment2'] . '/' . globalAttribute()['uriSegment3'] . '/' . globalAttribute()['uriSegment3'],
                "plugin" => 'assets/css/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment2'] . '/' . globalAttribute()['uriSegment3'] . '/' . globalAttribute()['uriSegment3'] . '-plugin'
            ];
        endif;
    elseif (globalAttribute()['uriSegment2'] != null || globalAttribute()['uriSegment2'] != "") :
        if (is_numeric(globalAttribute()['uriSegment2']) || globalAttribute()['uriSegment1'] == "cara-pakai") :
            $arr = [
                "css" => 'assets/css/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment1'],
                "plugin" => 'assets/css/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment1'] . '-plugin'
            ];
        else :
            $arr = [
                "css" => 'assets/css/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment2'] . '/' . globalAttribute()['uriSegment2'],
                "plugin" => 'assets/css/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment2'] . '/' . globalAttribute()['uriSegment2'] . '-plugin'
            ];
        endif;
    else :
        $arr = [
            "css" => 'assets/css/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment1'],
            "plugin" => 'assets/css/src/panel/' . globalAttribute()['uriSegment1'] . '/' . globalAttribute()['uriSegment1'] . '-plugin'
        ];
    endif;
    return $arr;
}

/**
 * css component auth
 */
function cssAuth()
{
    /**
     * load view js
     */
    if (globalAttribute()['uriSegment1'] == null) :
        $arr = [
            "css" => 'assets/css/src/auth/login/login',
            "plugin" => 'assets/css/src/auth/login/login-plugin'
        ];
    else :
        $arr = [
            "css" => 'assets/css/src/auth/' . globalAttribute()['uriSegment1'] .  '/' . globalAttribute()['uriSegment1'],
            "plugin" => 'assets/css/src/auth/' . globalAttribute()['uriSegment1'] .  '/' . globalAttribute()['uriSegment1'] . '-plugin'
        ];
    endif;
    return $arr;
}

/**
 * custom item componen
 */
function customItem($param1, $param2, $param3 = null)
{
    /**
     * load view item
     */
    if ($param3 != null) :
        return 'panel.' . $param1 . '.' . $param2 . '.item.' . $param3;
    elseif ($param2 == null) :
        return 'panel.' . $param1 . '.item.' . $param1;
    else :
        return 'panel.' . $param1 . '.item.' . $param2;
    endif;
}

/**
 * custom componen
 */
function customComponent($param1, $param2, $param3 = null)
{
    /**
     * load view component
     */
    if ($param3 != null) :
        return 'panel.' . $param1 . '.' . $param2 . '.component.' . $param3;
    elseif ($param2 == null) :
        return 'panel.' . $param1 . '.component.' . $param1;
    else :
        return 'panel.' . $param1 . '.component.' . $param2;
    endif;
}

/**
 * custom content
 */
function customContent($param1, $param2, $param3 = null)
{
    /**
     * load view content
     */
    if ($param3 != null) :
        return 'panel.' . $param1 . '.' . $param2 . '.content.' . $param3;
    elseif ($param2 == null) :
        return 'panel.' . $param1 . '.content.' . $param1;
    else :
        return 'panel.' . $param1 . '.content.' . $param2;
    endif;
}