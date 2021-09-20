@extends("layouts/admin/main")
@section("content")
<section class="side-cont">
   @include('layouts.admin.print_head')
   <div class="box box-solid">
      <div class="box-body">
         <div class="row">
            <div class="col-md-12">
               <div class="col-md-3">
                  <div id="test-list" class="notebooks">
                     <input type="text" class="search">
                     <ul class="list" id="listitem">
                        @foreach ($list as $lists)
                        <a href="{{route('paymentvoucher-view-route',['id'=>$lists->voucher_no])}}">
                           @if($lists->voucher_no==$data->voucher_no)  
                           <li class="invpiv active" >
                           @else
                           <li class="invpiv" >
                           @endif
                              <p><strong class="pino">{{$lists->voucher_no}}</strong><br><br><strong>{{$lists->date}}</strong></p>
                              <div class="sname" style="margin-top: -52px;float: right; position: relative;top: 6px;"><strong>T: ৳{{$lists->amount}}</strong></div>
                           </li>
                        </a>
                        @endforeach
                     </ul>
                     <div class="whole">
                        <span>
                           <a class="pagination-prev disabled" href="#">
                           &lt;&lt;
                           </a>
                           <ul class="pagination-layout">
                              <li class="active"><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">1</a></li>
                           </ul>
                           <a class="pagination-next" href="#">
                           &gt;&gt;
                           </a>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="col-md-9">
                  <div class="invhold scrol-y" id="invhold">
                      @include('layouts.admin.print_head2')
                        <div class="wrapper" style="width: 407.726px; height: 574.703px; overflow: hidden;">
                           <div id="wrap_invoice" class="page A4 portrait" style="transform: scale(0.51); transform-origin: 10px 0px 0px;">
                              <div class="invoice_header etat_header">
                                 <div class="row model1">
                                    <div class="col-xs-3 invoice-logo">
                                       <img src="{{asset('public/frontend/img/no_logo_1589308197.png')}}" alt="Axes Business Automation" style="vertical-align:middle; width: 100%;">
                                    </div>
                                    <div class="col-xs-5 invoice-header-info" id="adheight" style="height: 140px;">
                                       <h4>Axes Business Automation</h4>
                                       <p>Banasree Staff Quarter Road, Nagdarpar (Police Box), Khilgaon, Dhaka - 1219<br><strong>Phone:</strong> 7217831<br><strong>Mobile:</strong> 01616170070<br><strong>Email:</strong> axes@gmail.com<br><strong>Web:</strong> http://www.axesgl.com</p>
                                    </div>
                                    <div class="col-xs-4 invoice-header-invoice" id="inheight" style="height: 140px;">
                                       <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($data->voucher_no, 'C39')}}" alt="barcode" style="margin-right: -10px;padding-bottom: 5px;"><br><strong>Payment N°:</strong> {{$data->voucher_no}}
                                       <br><strong>Date:</strong> {{$data->date}}
                                    </div>
                                 </div>
                                 <hr>
                                 <div class="clearfix"></div>
                              </div>
                              <center>
                                 <h3 class="page-title">EXPENSES VOUCHER</h3>
                              </center>
                              <div class="etat_content">
                                    <div class="page_split">
                                        <hr>
                                        <br>
                                        
                                        <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
                                            <thead>
                                                <tr>
                                                    <th style="width:5% !important;">N°</th>
                                                    <th style="width:33% !important;">Head of Accounts</th>
                                                    <th style="width:12% !important;">Mode</th>
                                                    {{-- <th style="width:12.5% !important;">Cheque</th>
                                                    <th style="width:12% !important;">Date</th> --}}
                                                    <th style="width:12.5% !important; text-align:center;">Amount</th>
                                                    <th style="width:13% !important; text-align:center;">Reference</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $i=1;
                                                @endphp
                                                @foreach ($details as $detail)
                                                    <tr>
                                                        <td class="text-md-center">{{$i++}}</td>
                                                        <td class="text-md-left">{{$detail->expense_name}}</td>
                                                        <td class="text-md-left">{{$detail->other_credits}}</td>
                                                        {{-- <td style="text-align:left;">{{$detail->cheque_no}}</td>
                                                        <td style="text-align:left;">{{$detail->cheque_date}}</td>   --}}
                                                        <td class="text-md-right">{{$detail->amount}}</td> 
                                                        <td class="text-md-left">{{$detail->ref}}</td>   
                                                    </tr>    
                                                  @endforeach  
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3" style="font-weight: bold;text-align:center;">-Total-</td>
                                                    <td id="total" style="text-align:right;">{{$data->amount}}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td id="word_translate" colspan="7"><span style="font-weight: bold;">In Word:</span>{{ NumConvert::word($data->amount)}} Taka Only</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7"><span style="font-weight: bold;">Note:{{$data->note}} </span></td>
                                                </tr>
                                            </tfoot>    
                                        </table>    
                                    </div>    
                                </div>
                              <div style="clear: both;"></div>
                              <div class="etat_footer">
                                <div class="row">
                                   
                                    <div class="col-xs-4">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>    
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Prepared By</p>
                                    </div>
                                    <div class="col-xs-4">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>    
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Checked By</p>
                                    </div>
                                    <div class="col-xs-4">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>    
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Approved By</p>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                                <div style="clear: both;"></div>
                                </div>
                              <div class="invoice_footer">
                                 <hr>
                                 <p style="margin-top: -5px;">Axes Business Automation. © 2021</p>
                              </div>
                              <div style="clear: both;"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection
