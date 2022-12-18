<?php

class View
{
    protected $baseDir;

    public function __construct($baseDir)
    {
        $this->baseDir = $baseDir;
    }

    public function render($path, $variables, $layout = false)
    {
        // ['groups' => []]が$variablesに入る
        // extractで $groups = []のように変数展開してくれる　viewファイルで使う変数の宣言をしている
        extract($variables);

        // ob_は画面出力せずにrequireした内容を変数に入れる為に利用
        // 今回はコンテンツ（可変部）とレイアウト（不変部）を切り分ける為に利用
        ob_start();
        // views/shuffle/index.phpをrequireしている
        require $this->baseDir . '/' . $path . '.php';
        $content = ob_get_clean();

        ob_start();
        require $this->baseDir . '/' . $layout . '.php';
        $layout = ob_get_clean();

        return $layout;
    }
}
