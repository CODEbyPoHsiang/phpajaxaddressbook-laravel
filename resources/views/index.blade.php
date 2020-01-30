<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>通訊錄 || PHP - AJAX</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      <!-- Important to work AJAX CSRF -->
      <meta name="_token" content="{!! csrf_token() !!}" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

      <style>
      body
      {
        margin:0;
        padding:0;
        background-color:#f1f1f1;
      }
      /* .box
      {
        width:1270px;
        padding:20px;
        background-color:#fff;
        border:1px solid #ccc;
        border-radius:5px;
        margin-top:100px;
      } */
      </style>
  </head>
  <body>
    <div class="container">
      <h1>通訊錄</h1>
      <br />
        <div align="right">
          <button id="btn_add" name="btn_add" class="btn btn-primary pull-right" style="border-Radius: 0px;">新增聯絡人</button>
        </div>
        <br />
        <br />
        <br />
            <!-- <div class="row">
                <div class="col-md-12"> -->
                <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <!-- <th>ID </th> -->
                              <th width="15%">姓名</th>
                              <th width="15%">電話</th>
                              <th width="25%">電子信箱</th>
                              <th width="40%">地址</th>
                              <th width="10%">操作</th>
                              <th width="10%">動作</th>
                            </tr>
                        </thead>
                        <tbody id="products-list" name="products-list">
                            @foreach ($products as $product)
                              <tr id="product{{$product->id}}" class="active">
                                  <!-- <td>{{$product->id}}</td> -->
                                  <td>{{$product->name}}</td>
                                  <td>{{$product->phone}}</td>
                                  <td>{{$product->email}}</td>
                                  <td>{{$product->address}}</td>
                                  <td>
                                      <button class="btn btn-warning btn-detail open_modal" value="{{$product->id}}" style="border-Radius: 0px;">編輯</button>
                                  </td>
                                  <td>
                                      <button class="btn btn-danger btn-delete delete-product" value="{{$product->id}}" style="border-Radius: 0px;">刪除</button>
                                  </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table> 
                <!-- </div>
            </div> -->
        </div>

        <!-- Passing BASE URL to AJAX -->
        <input id="url" type="hidden" value="{{ \Request::url() }}">

        <!-- MODAL SECTION -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width:800px"  >
            <div class="modal-content" style="border-Radius: 0px;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Product Form</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-xs-6">
                    <label for="inputName" class="col-sm-3 control-label">姓名</label>
                    <input type="text" class="form-control has-error" id="name" name="name" style="border-Radius: 0px;" placeholder="" value="">
                  </div>
                  <div class="col-xs-6">
                    <label class="text-light">英文姓名</label>
                    <input type="text" name="ename" id="ename" class="form-control" style="border-Radius: 0px;" required />
                  </div>
                </div>
                <br />
                <div class="row">
                    <label for="inputDetail" class="col-sm-3 control-label">電話</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputDetail" class="col-sm-3 control-label">電子信箱</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" placeholder="" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputDetail" class="col-sm-3 control-label">地址</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="address" name="address" placeholder="" value="">
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" id="btn-save" name="btn-save" style="border-Radius: 0px;"/>
                <input type="hidden" id="product_id" name="product_id" value="0">
              </div>
            </div>
          </div>
        </div>
    </body>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/ajaxscript.js')}}"></script>
</html>
