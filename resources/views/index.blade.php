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
                    <div class="pull-right">
                        <button id="btn_add" name="btn_add" class="btn btn-primary pull-right" style="border-Radius: 0px;">新增聯絡人</button>
                    </div>
                    <br />
                    <br />
                    <br />
            
            
            <div class="row">
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
                                  <td>{{$product->city}}{{$product->postcode}}{{$product->township}}{{$product->address}}</td>
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
                </div>
            </div>
        </div>

        <!-- Passing BASE URL to AJAX -->
        <input id="url" type="hidden" value="{{ \Request::url() }}">

        <!-- MODAL SECTION -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width:800px">
            <div class="modal-content"  style="border-Radius: 0px;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Product Form</h4>
              </div>
              <div class="modal-body">
                <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                  <div class="row">
                    <div class="col-xs-6">
                      <label  for="inputName">姓名</label>
                      <input type="text" class="form-control has-error" id="name" name="name" style="border-Radius: 0px;" required />
                    </div>
                    <div class="col-xs-6">
                      <label >英文姓名</label>
                      <input type="text" name="ename" id="ename" class="form-control" style="border-Radius: 0px;">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-4">
                      <label  >電話</label>
                      <input type="text" class="form-control" id="phone" name="phone" style="border-Radius: 0px;"/>
                    </div>
                    <div class="col-xs-4">
                      <label class="text-light" >電子信箱</label>
                      <input type="text" class="form-control" id="email" name="email" style="border-Radius: 0px;"/>
                    </div>
                    <div class="col-xs-4">
                      <label >性別</label>
                      <input type="text" class="form-control" id="sex" name="sex"  style="border-Radius: 0px;"/>
                    </div>
                  </div>
                  <br />
                <div class="row">
                  <div class="col-xs-4">
                    <label >居住城市</label>
                    <input type="text" name="city" id="city" class="form-control" style="border-Radius: 0px;"/>
                  </div>
                  <div class="col-xs-4">
                      <label >鄉鎮市區</label>
                      <input type="text" name="township" id="township" class="form-control" style="border-Radius: 0px;"/>
                  </div>
                  <div class="col-xs-4">
                      <label >郵遞區號</label>
                      <input type="text" name="postcode" id="postcode" class="form-control" style="border-Radius: 0px;"/>
                  </div>
                </div>
                <br />
                <div class="row">
                  <div class="col-xs-12">
                      <label >詳細地址</label>
                      <input type="text" name="address" id="address" class="form-control" style="border-Radius: 0px;"/>
                  </div>
                </div>
                <br />
                <div class="row">
                  <div class="col-xs-12">
                      <label>備註</label>
                      <textarea  type="textarea" name="notes" id="notes" class="form-control" style="border-Radius: 0px;"></textarea>
                  </div>
                </div>
                </form>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary" id="btn-save" value="add">Save Changes</button> -->
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
