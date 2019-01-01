@extends('layouts.admin')
@section('all-work-category')
<div class="row data-list">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>Work's Category</strong>
            </div>
            <div class="clearfix"></div>

          </div>
          <div class="panel-body" >
            <?php $defaultPerPage=4; if(empty($perPageArray)) { $perPageArray = array(5, 10, 20, 100); } ?>
          <div class="dataTables_length">
                <a href="{{url('admin/add-work-category')}}" class="add-btn btn btn-default pull-right btn-sm"> <i class="fa fa-plus-square"></i> Add Work Category</a>
            <label>
                  <span>
                      <select name="basic-datatables_length" class="form-control input-sm" id="perPage">
                          @foreach($perPageArray as $perPageVal)
                          <option onclick="myFunction()" @if(!empty($perPage) && ($perPage==$perPageVal)) {{'selected'}} @elseif(empty($perPage) && ($defaultPerPage==$perPageVal)) {{'selected'}} @endif value="{{$perPageVal}}">{{$perPageVal}}</option>
                          @endforeach
                      </select>
                  </span>
              </label>
          </div>

          <form method="get" action="{{url('/admin/all-work-category')}}" role="search">
            {{csrf_field()}}
          <!-- <input type="text" placeholder="search" name="search" />
          <input type="submit" value="search" /> -->
          <div class="input-group col-md-3">
                <input name="search" type="text" class="data-search form-control" id="search-input" placeholder="Search">
                <span class="input-group-btn"><button value="search" class="data-search btn btn-default" type="submit">Search</button></span>
          </div>
          </form><br>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="active">
                        <th onclick="javascript:location.replace('{{url('/admin/all-work-category?'.(($asc==1)?'desc':'asc').'=1')}}')" >ID <i id="btn1" class="fa fa-sort-up"></i></th>

                        <th>Category Name</th>
                        <!-- <th>Status</th> -->
                        <!-- <th>Photo</th> -->
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($allworkcategory as $data)
                    <tr>
                        <td>{{$data->category_id}}</td>
                        <td>{{$data->category_name}}</td>
                        <td class="col-md-1">

                            <a href="{{url('admin/edit-work-category/'.$data->category_id)}}" title="Edit"><i class="fa fa-pencil-square"></i></a>
                            

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <?php echo $allworkcategory->render(); ?>

          </div>
          <div class="panel-footer">
            .
          </div>
        </div>
    </div>
</div>
@endsection
