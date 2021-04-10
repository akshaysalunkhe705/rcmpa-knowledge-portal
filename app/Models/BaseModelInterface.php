<?php

namespace App\Models;

interface BaseModelInterface
{
    public function add($request);
    public function edit($request, $id);
    public function fetch_single($id);
    public function fetch_all();
    public function remove($id);
}
