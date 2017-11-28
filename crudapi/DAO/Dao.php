<?php

interface Dao
{

    function addNew($item);

    function update($item);

    function delete($item);

    function getOne($id);

    function getAll();
}