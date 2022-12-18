<?php

class AutoLoader
{
    private $dirs;

    public function register()
    {
        spl_autoload_register([$this, 'loadClass']);
    }

    public function registerDir($dir)
    {
        $this->dirs[] = $dir;
    }

    private function loadClass($className)
    {
        foreach ($this->dirs as $dir) {
            $file = $dir . '/' . $className . '.php';
            if (is_readable($file)) {
                require $file;
                return;
            }
        }
    }
}
