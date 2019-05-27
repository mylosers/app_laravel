@extends('layouts.app')

@section('title', '收货地址')

@section('sidebar')
    @parent
@endsection

@section('body')
<!-- address -->
<div class="checkout pages section">
    <div class="container">
        <div class="pages-head">
            <h3>Address</h3>
        </div>
        <div class="checkout-content">
            <div class="row">
                <div class="col s12">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header active"><h5>省</h5></div>
                            <div class="collapsible-body">
                                @foreach($res as $v)
                                    <input type="button" value="{{$v->name}}" class="check_province">
                                    <input value="{{$v->id}}" type="hidden" >
                                @endforeach
                            </div>
                        </li>
                        <li id="check_town">
                            <div class="collapsible-header active"><h5>市</h5></div>
                            <div class="collapsible-body"></div>
                        </li>
                        <li id="check_county">
                            <div class="collapsible-header active"><h5>县/区</h5></div>
                            <div class="collapsible-body"></div>
                        </li>
                    </ul>
                    收货人:    <input id="user" type="text" placeholder="收货人姓名">
                    收货人电话:<input id="phon" type="text" placeholder="请输入手机号">
                    收货地址:  <input id="addre" type="text" placeholder="详细到门牌号">
                    <input id="btn" type="button" value="添加" class="btn button-default">
                </div>

            </div>
        </div>
    </div>
</div>
<input type="hidden" value="" id="sheng">
<input type="hidden" value="" id="shi">
<input type="hidden" value="" id="xian">
<!-- end address -->
<script src="/js/jquery-3.3.1.min.js"></script>
<script>
    $(function () {
        //根据省找市
        $('.check_province').click(function (){
            var id=$(this).next().val();//获取id
            var name=$(this).val();//获取name
            $('#sheng').nextAll().val('');
            $('#sheng').val(id);
            $(this).parent().prev().children().text(name);//替换省

            //ajax传id查市
            $.ajax({
                url:'/user/address/town',
                data:{id:id},
                type:'post',
                dataType:'json',
                success:function (info){
                    var _str="";
                    $.each(info.data,function (i,v){
                        _str +='<input type="button" value='+v.name+' class="check_town">'
                                +'<input value='+v.id+' type="hidden" >'
                    });
                    $('#check_town').children().last().empty();//清除其他
                    $('#check_town').children().last().append(_str);//追加市
                }
            })
        })


        //追加市
        $(document).on('click','.check_town',function (){
            var id=$(this).next().val();//获取id
            $('#shi').nextAll().val('');
            $('#shi').val(id);
            var name=$(this).val();//获取name
            $(this).parent().prev().children().text(name);//替换县区

            //ajax传id查市
            $.ajax({
                url:'/user/address/county',
                data:{id:id},
                type:'post',
                dataType:'json',
                success:function (info){
                    var _str="";
                    $.each(info.data,function (i,v){
                        _str +='<input type="button" value='+v.name+' class="check_county">'
                            +'<input value='+v.id+' type="hidden" >'
                    });
                    $('#check_county').children().last().empty();//清除其他
                    $('#check_county').children().last().append(_str);//追加县区
                }
            })
        })

        //找县区
        $(document).on('click','.check_county',function (){
            var id=$(this).next().val();//获取id
            $('#xian').nextAll().val('');
            $('#xian').val(id);

            var name=$(this).val();//获取name
            $(this).parent().prev().children().text(name);//替换县区

            //ajax传id查市
            $.ajax({
                url:'/user/address/county',
                data:{id:id},
                type:'post',
                dataType:'json',
                success:function (info){
                    var _str="";
                    $.each(info.data,function (i,v){
                        _str +='<input type="button" value='+v.name+' class="check_county">'
                            +'<input value='+v.id+' type="hidden" >'
                    });
                    $('#check_county').children().last().empty();//清除其他
                    $('#check_county').children().last().append(_str);//追加市
                }
            })
        })


        //入库
        $(document).on('click','#btn',function (){
            //获取数据
            var _data={};
            var shengid=$('#sheng').val();
            var shiid=$('#shi').val();
            var xianid=$('#xian').val();
            var user=$('#user').val();
            var phon=$('#phon').val();
            var addre=$('#addre').val();

            _data.shengid=shengid;
            _data.shiid=shiid;
            _data.xianid=xianid;
            _data.user=user;
            _data.phon=phon;
            _data.addre=addre;


            //uid
            var storage=window.localStorage;
            var uid=storage["uid"];

            _data.uid=uid;

            //入库
            $.ajax({
                url:'/user/address/addressadd',
                data:{data:_data},
                type:'post',
                dataType:'json',
                success:function (res){
                    if(res.status==200){
                        alert(res.msg);
                    }else if (res.status==300){
                        alert(res.msg);
                    }
                }
            })

        })



    })
</script>
@endsection


@section('bottom')
    @parent
@endsection

