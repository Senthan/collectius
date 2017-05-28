<?php

if (!function_exists('breadcrumb')) {

    function breadcrumb($data) {
        $breadcrumb = [];
        foreach ($data as $key => $item) {
            if(!isset($item['text'])) {
                continue;
            }
            if(!isset($item['class'])) {
                $breadcrumb[$key]['class'] = '';
            } else {
                $breadcrumb[$key]['class'] = $item['class'];
            }
            if(!isset($item['parameters'])) {
                $breadcrumb[$key]['parameters'] = [];
            } else {
                $breadcrumb[$key]['parameters'] = $item['parameters'];
            }
            if(isset($item['route'])) {
                $breadcrumb[$key]['route'] = $item['route'];
            }
            $breadcrumb[$key]['text'] = title_case($item['text']);
        }

        return view('components.partial.breadcrumb', compact('breadcrumb'))->render();
    }
}
