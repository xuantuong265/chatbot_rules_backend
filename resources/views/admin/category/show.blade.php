@extends('admin.main')

@section('content')
@include('sweetalert::alert')

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th> Name </th>
                <th> Description </th>
                <th> Update </th>
                <th style="width: 100px;"> &nbsp </th>
            </tr>
        </thead>
        <tbody>
            {{ Category($categories) }}
        </tbody>
    </table>
@endsection
<?php
function Category($categories, $parent_id = 0, $char = '')
{
    $html = '';
    foreach ($categories as $key => $category) {
        if ($category->parent_id == $parent_id) {
            echo '<tr>';
            echo '<td>' . $category->id . '</td>';
            echo '<td><a class="showproduct" href="'.url('category/showproduct/' . $category->id).'" >' . $char . $category->name . '</a></td>';
            echo '<td>' . $category->description . '</td>';
            echo '<td>';
?>
            @can('edit category')

<?php

            echo  '<a type="button" class="edit btn btn-success" href="'.url('category/edit/' . $category->id).'"> <i class="nav-icon fas fa-edit	"></i> </a>';
?>
            @endcan
            @can('delete category')
<?php
             echo   ' <a type="button" class="delete btn btn-danger" href="'.url('category/delete/' . $category->id).'"> <i class="nav-icon 	fas fa-trash"></i> </a>';

?>
            @endcan
<?php
            echo '</td>';
             echo '</tr>';

            unset($categories[$key]);
            Category($categories, $category->id, $char . '||---');
        }
    }

    return $html;
}
?>
