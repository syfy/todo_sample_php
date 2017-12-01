<?php

interface Dao
{

    function addNew(Task $item);

    function update(Task $item);

    function delete(Task $item);

    function getOne($id);

    function getAll();
}