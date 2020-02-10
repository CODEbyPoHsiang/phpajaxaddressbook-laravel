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


     <!-- 使用sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>


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

      label.xrequired:after {
        content: '*(此欄位為必填) ';
        color: red;
    }

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
                        <tbody id="members-list" name="members-list">
                            @foreach ($members as $member)
                              <tr id="member{{$member->id}}" class="active">
                                  <!-- <td>{{$member->id}}</td> -->
                                  <td>{{$member->name}}</td>
                                  <td>{{$member->phone}}</td>
                                  <td>{{$member->email}}</td>
                                  <td>{{$member->city}}{{$member->postcode}}{{$member->township}}{{$member->address}}</td>
                                  <td>
                                      <button class="btn btn-warning btn-detail open_modal" value="{{$member->id}}" style="border-Radius: 0px;">編輯</button>
                                  </td>
                                  <td>
                                      <button class="btn btn-danger btn-delete delete-member" value="{{$member->id}}" style="border-Radius: 0px;">刪除</button>
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
                <h2 class="modal-title" id="myModalLabel">Member Form</h2>
              </div>
              <div class="modal-body">
                <form id="frmMembers" name="frmMembers" class="form-horizontal" novalidate="">
                  <div class="row">
                    <div class="col-xs-6">
                      <label  class="xrequired" >姓名</label>
                      <input type="text"  required="required" class="form-control has-error" id="name" name="name" style="border-Radius: 0px;" required />
                    </div>
                    <div class="col-xs-6">
                      <label class="text-light"  >英文姓名</label>
                      <input type="text" name="ename" id="ename" class="form-control" style="border-Radius: 0px;">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-4">
                      <label class="text-light"  >電話</label>
                      <input type="text" class="form-control" id="phone" name="phone" style="border-Radius: 0px;"/>
                    </div>
                    <div class="col-xs-4">
                      <label class="text-light" >電子信箱</label>
                      <input type="text" class="form-control" id="email" name="email" style="border-Radius: 0px;"/>
                    </div>
                    <div class="col-xs-4">
                      <label class="text-light"  >性別</label>
                      <input type="text" class="form-control" id="sex" name="sex"  style="border-Radius: 0px;"/>
                    </div>
                  </div>
                  <br />
                <div class="row">
                  <div class="col-xs-4">
                    <label class="text-light" >居住城市</label>
                    <input type="text" name="city" id="city" class="form-control" style="border-Radius: 0px;"/>
                  </div>
                  <div class="col-xs-4">
                      <label class="text-light" >鄉鎮市區</label>
                      <input type="text" name="township" id="township" class="form-control" style="border-Radius: 0px;"/>
                  </div>
                  <div class="col-xs-4">
                      <label class="text-light" >郵遞區號</label>
                      <input type="text" name="postcode" id="postcode" class="form-control" style="border-Radius: 0px;"/>
                  </div>
                </div>
                <br />
                <div class="row">
                  <div class="col-xs-12">
                      <label class="text-light" >詳細地址</label>
                      <input type="text" name="address" id="address" class="form-control" style="border-Radius: 0px;"/>
                  </div>
                </div>
                <br />
                <div class="row">
                  <div class="col-xs-12">
                      <label class="text-light" >備註</label>
                      <textarea  type="textarea" name="notes" id="notes" class="form-control" style="border-Radius: 0px;"></textarea>
                  </div>
                </div>
                </form>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary" id="btn-save" value="add">Save Changes</button> -->
                <input type="submit" class="btn btn-primary" id="btn-save" name="btn-save" style="border-Radius: 0px;"/>

                <input type="hidden" id="member_id" name="member_id" value="0">
              </div>
            </div>
          </div>
        </div>
    </body>

    <!-- 引用放在public裡面的ajax的js程式碼 -->
    <script src="{{asset('js/ajaxscript.js')}}"></script>
</html>
