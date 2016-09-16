<?php

namespace genepeng\qiyukf\Foundation;

use Symfony\Component\HttpFoundation\Request;

interface DaemonInterface
{
    public function onReceived(Request $request);
}
