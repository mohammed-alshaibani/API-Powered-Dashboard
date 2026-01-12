@extends('layouts.dashboard.User.headeruser')
@section('content')

<div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> لوحة التحكم </h1>
        
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
            
                <i class="fa fa-dashboard"></i> لوحة التحكم
            
            </li>
        </ol>
        
    </div>
</div>

<div class="row" id="row" >
  
   <div class="col-lg-3 col-md-6">
        <div class="panel panel-danger">
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> 4 </div>
                           
                        <div> الطلبات </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="">
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        View Details 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-red finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
    
</div>

<div class="row"><!-- row no: 3 begin -->
    <div class="col-lg-12"><!-- col-lg-8 begin -->
        <div class="panel panel-primary"><!-- panel panel-primary begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    
                    <i class="fa fa-money fa-fw"></i> طلبات جديدة
                    
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- table table-hover table-striped table-bordered begin -->
                        
                        <thead><!-- thead begin -->
                          
                            <tr><!-- th begin -->
                           
                                <th> رقم الطلب: </th>
                                <th> رقم العميل: </th>
                                <th> إسم المنتج: </th>
                                <th> الكمية: </th>
                                <th> الحالة: </th>
                                <th>تعديل:</th>
                            
                            </tr><!-- th finish -->
                            
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                           
                            <tr><!-- tr begin -->
                                <td> 23 </td>
                                <td> anton@gmail.com </td>
                                <td> Iphone x black </td>
                                <td> 5 </td>
                                <td> Approved </td>
                                 <td>
                                	<a href="#" class="btn btn-info btn-sm">
         							 <span class="glyphicon glyphicon-remove"></span> Edit 
        							</a>
                                </td>
                                
                            </tr><!-- tr finish -->
                           
                            <tr><!-- tr begin -->
                                <td> 42 </td>
                                <td> halima@yandex.com </td>
                                <td> Gap white T-shirt</td>
                                <td> 13 </td>
                                <td> Pending </td>
                                 <td>
                                	<a href="#" class="btn btn-info btn-sm">
         							 <span class="glyphicon glyphicon-remove"></span> Edit 
        							</a>
                                </td>
                                
                            </tr><!-- tr finish -->
                           
                            <tr><!-- tr begin -->
                                <td> 56 </td>
                                <td> reza@yahoo.com </td>
                                <td> American Movie </td>
                                <td> 7 </td>
                                <td> Pending </td>
                                 <td>
                                	<a href="#" class="btn btn-info btn-sm">
         							 <span class="glyphicon glyphicon-remove"></span> Edit 
        							</a>
                                </td>
                                
                            </tr><!-- tr finish -->

                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
                
                <div class="text-right"><!-- text-right begin -->
                    
                    <a href="index.php?orders"><!-- a href begin -->
                        
                    جميع الطلبات <i class="fa fa-arrow-circle-right"></i>
                        
                    </a><!-- a href finish -->
                    
                </div><!-- text-right finish -->
                
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-8 finish -->
    
</div>

@endsection