<html>
    <head>
        <script src="{{ asset('js/ct_js_test.js')}}"></script>
    </head>
</html>
<?php

namespace cleantalk\antispam\Widgets;


class CleantalkWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.cleantalk', [
            'config' => $this->config,
        ]);
    }
}