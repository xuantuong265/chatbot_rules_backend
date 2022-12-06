
@section('searchcategory')
    <div class="card-tools">
        <form action="{{ route('category.search') }}" method="GET">
            <div class="input-group input-group-sm" style="width: 300px; float: right;">

                <input type="text" name="query" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
        </form>
    </div>
    </div>
    @if (isset($searchs))
        @if (Session::has('success'))
            <div class="success">

                {{ Session::get('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th> Name </th>
                    <th> Description </th>
                    <th> Active </th>
                    <th> Update </th>
                    <th style="width: 100px;"> &nbsp </th>
                </tr>
            </thead>
            <tbody>
                {{ Category($searchs) }}
            </tbody>
        </table>






    @endif
@endsection

<?php
function Category($searchs, $parent_id = 0, $char = '')
{
    $html = '';

    foreach ($searchs as $key => $category) {
        if ($category->parent_id == $parent_id) {
            echo '<tr>';
            echo '<td>' . $category->id . '</td>';
            echo '<td><a class="showproduct" href="' . url('category/showproduct/' . $category->id) . '" >' . $char . $category->name . '</a></td>';
            echo '<td>' . $category->description . '</td>';
            echo '<td>' . $category->active . '</td>';

            echo '<td> <a type="button" class="edit btn btn-success" href="' .
                url('category/edit/' . $category->id) .
                '"> Edit </a>
                <a type="button" class="delete btn btn-danger" href="' .
                url('category/delete/' . $category->id) .
                '"> Delete </a>

                </tr>';

            unset($searchs[$key]);
            Category($searchs, $category->id, $char . '||---');
        }
    }

    return $html;
}
?>
@endsection
