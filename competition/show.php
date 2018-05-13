@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">


            @foreach($logements as $log)
            <div class="col-sm-4 col-lg-4 col-md-4">

                        <div class="thumbnail" >
                            <img src="/uploads/photos/{{$log->img1}}"  style="width: 350px;  height: 150px">
                            <div class="caption" style="padding: 1px;color: #333;">
                                <h4 class="pull-right"><strong>{{$log->prix}} DH</strong></h4>
                                <h4><a href="{{url('annonce/'.$log->id)}}">{{$log->titre}}</a>
                                </h4>
                                <div class="clearfix"></div>
                                <hr style="margin:3px 0 3px 0;">
                                <p>Categorie :{{$log->categorie->name}}<br/>
                                Region :{{$log->region->name}}<br/>
                                Ville :{{$log->ville->name}}<br/>
                               Posted <strong>{{$log->created_at->diffForHumans()}}</strong>
                                
                                <a class="pull-right" href="{{url('annonce/'.$log->id)}}">
                                plus de details...</a>
                                </p>
            <div class="clearfix"></div>
            <hr style="margin:3px 0 3px 0;">
                            </div>
                            <div class="ratings" style="margin-left:5px ;margin-right: 5px; color:#301b1c">
                                <div   style=" font-size: 18px;margin-left: 230px"  >{{$log->reviews->count()}}<i class="fa fa-comments" style="margin-left: 5px"></i></div>
                            </div>
                            
                        </div>


                    </div>
            @endforeach


            <div class="text-center">{!! $logements->links(); !!}</div>
        </div>
    </div>
</div>

@endsection