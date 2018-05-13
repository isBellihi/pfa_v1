@extends('layouts.app')

@section('content')

  <div class="container "  style="margin-top: 100px">
  <div class="row " style="margin-left: -40px;" >
  
        @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{Session::get('success')}}
    </div>
    @endif
         <style type="text/css">
           .clss
            {
              /*padding: 30px;*/
              background: rgba(255, 2, 3, 0.2);
              background-color: lightgrey;
              color: #FFF !important;
            }
         </style> 
            @if(Auth::check() && $logement->user_id==Auth::user()->id)
              <div class="panel panel-group "  data-spy="affix" style=" right:30px;position:absolute; ;width: 360px;margin-right: -20px;x">
                
                    <div class="panel-heading " href="#demo" data-toggle="collapse" style="font-weight:bold;background-color: #70bcff"> Reserved<span class="badge" style="margin-left: 5px">{{$logement->reservations->count()}}</span></div>
                    <div id="" class="panel-body ">

                               @foreach($logement->reservations->slice(0,4) as $reservation)
                              <p @if(Auth::user()->id==$reservation->user_id) id="reserved" 
                              @else id="" @endif>{{ $reservation->created_at->diffForHumans()}} : {{$reservation->user->nom}} a reservé votre logement 
                              du {{$reservation->start_date->format('j F Y')}} jusqu'à {{$reservation->end_date->format('j F Y')}}
                              pour {{$reservation->montant}}DH</p>
                                
                                    <div class="clearfix" ></div>
                                    <hr style="margin-top:6px; ">
                            @endforeach
                            <a class="pull-right" href="{{url('/logements/show/'.$logement->id.
                            '/reserved')}}">voir l'esemble des reservations</a>
                            
                   
                    </div>
                </div>
            @else
              <div class="panel panel-group "  data-spy="affix" style=" right:30px;position:absolute; ;width: 360px;margin-right: -20px;x">
                    <div  class="panel-body " style="background: rgba(0, 0, 0, 0.1);">

                        <div ><img  class="text-center" src="/uploads/avatars/{{$logement->user->avatar}}" style="width:150px ;height:150px; float:left; border-radius: 50%; cursor: pointer;border:4px solid #ffffff; margin-top:-5px;margin-bottom: 20px;
                                margin-left: 80px">
                                </div>
                        <br> <br><br><br><br><br><br><br><br>
                        <div><span style="font-size: 20px">nom : </span><b>{{$logement->user->nom}} {{$logement->user->prenom}}</b></div>
                        <div><span style="font-size: 20px">Telephone :</span><b>  {{$logement->user->tel}}</b></div>
                        <div><span style="font-size: 20px">Email: </span><b>  {{$logement->user->email}}</b></div>
                        <div><span style="font-size: 20px">les langues :</span><b>  {{$logement->user->langue}}</b></div>
                        <div><button style="margin-left: 90px; margin-top: 7px; width: 150px;" class="btn btn-info"><i class="glyphicon glyphicon-send"></i>  <span style="margin-left: 10px;font-size: 15px; font-weight: bold;height: 30px">Contacter</span>  </button></div>
                    </div>
              </div>
              <div class="panel panel-group "  data-spy="affix" style=" right:30px;position:absolute; ;width: 360px;margin-right: -20px; margin-top: 500px">
               <div class="panel-heading " id="reserver" data-toggle="collapse" style="font-weight:bold;background-color: #70bcff"> Reserver ce logement<span class="badge" style="margin-left: 5px">{{$logement->reservations->count()}}</span></div>
                    <div  class="panel-body " style="background: rgba(204, 255, 102,0.5);">
                      <form method="POST" action="{{url('reserver/'.$logement->id)}}">
                      {{ csrf_field() }}
                        <div class="form-group demo">           
            <!--<input type="text" id="config-demo" class="form-control" name="date">
            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>-->

            <table class="table">
              <thead>
                <tr>
                  <td>date de debut</td>
                  <td>date de fin</td>
                </tr>
              </thead>
              <tbody>
                <td><input type="date" name="start_date" required="required"></td>
                <td><input type="date" name="end_date" required="required"></td>
              </tbody>
            </table>

            <div><button style="margin-left: 50px; margin-top: 7px; width: 250px;" class="btn btn-info"><i style="font-size: 20px" class="fa fa-cart-plus"></i>  <span style="margin-left: 10px;font-size: 15px; font-weight: bold;height: 30px">Reserver maintenant</span></button></div>
            </div>
                      </form>
                    </div>
              </div>

            @endif
            
<div style="position: absolute;">
<div class="panel panel-group" style="width : 900px;">
  <div class="panel-heading text-center " style="font-family: ;background-color: #aaffcd " ><h4 >{{$logement->titre}}</h4></div>
   <div class="panel-body ">
   
<div class="clearfix"></div><div style="margin-left: 50px">


      <div class="clearfix"></div>
            
            <script type="text/javascript">$('.carousel').carousel,#carousel-example-generic({
    pause: true,
    interval: false
});</script>


              <div class="row carousel-holder" style="margin-left:-60px ;">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                                
                                <div class="item active">
                                    <img class="slide-image" src="/uploads/photos/{{$logement->img1}}" style="width:870px;height:500px" alt="">
                                </div>
                       
                                @if($logement->img1!="" )
                                <div class="item ">
                                    <img class="slide-image" src="/uploads/photos/{{$logement->img1}}" style="width:870px;height:500px" alt="">
                                </div>@endif 
                                @if($logement->img2!="")
                                <div class="item ">
                                    <img class="slide-image" src="/uploads/photos/{{$logement->img2}}" style="width:870px;height:500px" alt="">
                                </div>
                               @endif
                                @if($logement->img3!="")
                                <div class="item ">
                                    <img class="slide-image" src="/uploads/photos/{{$logement->img3}}" style="width:870px;height:500px" alt="">
                                </div>@endif 
                                @if($logement->img4!="")
                                <div class="item ">
                                    <img class="slide-image" src="/uploads/photos/{{$logement->img4}}" style="width:870px;height:500px" alt="">
                                </div>@endif
                                 @if($logement->img5!="") 
                                <div class="item ">
                                    <img class="slide-image" src="/uploads/photos/{{$logement->img5}}" style="width:870px;height:500px" alt="">
                                </div>@endif
                                 @if($logement->img6!="") 
                                <div class="item ">
                                    <img class="slide-image" src="/uploads/photos/{{$logement->img6}}" style="width:870px;height:500px" alt="">
                                </div>@endif                                

                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!--      tableau        -->
                
                    <div class="table-responsive">
                         <h3 style="font-weight: bold ; text-align: center;"> Les informations : </h3><br>
                    <table class="table" style="text-align: center; "> 
                    <thead>
                      <tr class="success">
                        <td>Categorie </td>
                        <td>Local </td>
                        <td>Capacite d'accueil </td>
                        <td>Prix </td>
                      </tr>
                    </thead>    
                    <tbody>
                      <tr class="">
                            <td><div class="col-sm-7 col-xs-6 "><strong>{{$logement->categorie->name}}</strong></div>
                            </td>
                            <td><div class="col-sm-7 col-xs-6 "><strong>{{$logement->region->name}} {{$logement->ville->name}}</strong></div>
                            </td>     
                            <td><div class="col-sm-7 col-xs-6 "><strong>{{$logement->capacite}} voyageurs</strong></div>
                            </td>  
                            <td><div class="col-sm-7 col-xs-6 "><strong>{{$logement->prix}} DH</strong></div>
                            </td>                                                                                 
                        </tr>
                    </tbody>       
                        
                    </table>
                    </div>
                    
                
                    
                <!--       tableau       -->
          
       <h3 style="font-weight: bold ; text-align: center;"> Caractéristiques : </h3><br>

                    
                    <table class="table table-striped" style="text-align: center;"> 
                    <thead>
                      <tr class="">
                        <td><i class="glyphicon glyphicon-cutlery"> <span style="font-size: 20px;">Cuisine : </span></i>
                          @if($logement->iscuisine) <i style="margin-left: 10px; font-size: 20px;" class="glyphicon glyphicon-check"></i> @else <i style="margin-left: 10px;font-size: 20px;" class="glyphicon glyphicon-unchecked"></i> @endif</td>
                        <td><i class="fa fa-bath"> <span style="font-size: 20px;"> Salle de Bain : </span></i>
                        @if($logement->iswc) <i style="margin-left: 10px;font-size: 20px;" class="glyphicon glyphicon-check"></i> @else <i style="margin-left: 10px;font-size: 20px;" class="glyphicon glyphicon-unchecked"></i> @endif</td>
                        <td><i class="fa fa-television"> <span style="font-size: 20px;"> Televesion : </span></i>
                        @if($logement->istv) <i style="margin-left: 10px;font-size: 20px;" class="glyphicon glyphicon-check"></i> @else <i style="margin-left: 10px;font-size: 20px;" class="glyphicon glyphicon-unchecked"></i> @endif</td>
                      </tr>
                    </thead>

                    <thead >
                      <tr>
                         <td> <span style="font-size: 20px;">Machine a laver : </span>@if($logement->islavage) <i class="glyphicon glyphicon-check" style="margin-left: 10px;font-size: 20px;"></i> @else <i style="margin-left: 10px;font-size: 20px;" class="glyphicon glyphicon-unchecked"></i> @endif</td>
                        <td><i class="fa fa-wifi"></i> <span style="font-size: 20px;"> Internet : </span>@if($logement->iswifi) <i class="glyphicon glyphicon-check" style="margin-left: 10px;font-size: 20px;"></i> @else <i style="margin-left: 10px;font-size: 20px;" class="glyphicon glyphicon-unchecked"></i> @endif</td>
                        <td><span style="font-size: 20px;"> Logement fumeur : </span>@if($logement->isfumeur) <i class="glyphicon glyphicon-check" style="margin-left: 10px;font-size: 20px;"></i> @else <i style="margin-left: 10px;font-size: 20px;" class="glyphicon glyphicon-unchecked"></i> @endif</td>
                      </tr>
                      <tr>
                        <td><span style="font-size: 20px;"> Animaux acceptés : </span>@if($logement->isfumeur) <i class="glyphicon glyphicon-check" style="margin-left: 10px;font-size: 20px;"></i> @else <i style="margin-left: 10px;font-size: 20px;" class="glyphicon glyphicon-unchecked"></i> @endif</td>
                        <td><i class="fa "></i> <span style="font-size: 20px;"> Piscine : </span>@if($logement->ispiscine) <i class="glyphicon glyphicon-check" style="margin-left: 10px;font-size: 20px;"></i> @else <i style="margin-left: 10px;font-size: 20px;" class="glyphicon glyphicon-unchecked"></i> @endif</td>
                        <td><i class="fa "></i> <span style="font-size: 20px;"> Famille et enfants : </span>@if($logement->ishand) <i class="glyphicon glyphicon-check" style="margin-left: 10px;font-size: 20px;"></i> @else <i style="margin-left: 10px;font-size: 20px;" class="glyphicon glyphicon-unchecked"></i> @endif</td>
                      </tr>
                    </thead>                          
                    </table>
                </div>
      <br>
      <h3 style="font-weight: bold ; text-align: center;"> Description : </h3><br>
      <div class="col-sm-7 col-xs-6 " style=" "><center><p>{{$logement->description}}</p></center></div>
      
      <hr style="margin-right: 370px;margin-top:6px; ;width: 390px">
      </div>



</div>
<div class="panel panel-default  ">
  <div class="panel-heading" style="font-weight: bold;background-color: #c1c1c1"><h4>Commentaire</h4></div>
   <div class="panel-body  "> 
  
   @foreach($logement->reviews as $review)
   <div class="clearfix"></div>
                      <hr style="margin-bottom: 5px; font-weight: bold">

      
      @if(Auth::check())
        @if(Auth::user()->id == $review->user_id || Auth::user()->role=="admin" ||Auth::user()->id == $logement->user_id)
        <fieldset>
     <form action="{{url('logements/show/'.$logement->id.'/commentaire/crash/'.$review->id)}}" method="post">
     {{method_field('DELETE')}}
     <button type="submit" class="pull-right btn btn-danger" ><i class="glyphicon glyphicon-trash" ></i></button> 
     {{csrf_field()}}
                  {{method_field('DELETE')}}   
        </form>
        
    @endif
    @endif

    <p style="font-weight: bolder;margin-left: 10px;">
    <img src="/uploads/avatars/{{$review->user->avatar}}" class="img-circle" style="width:50px; height:50px; margin-right: 10px;top:10px; left:10px; ">{{$review->user->nom }} {{$review->user->prenom }}</p>
      <p style="margin-left : 8px" @if(Auth::check() && Auth::user()->id==$review->user_id) id="commente" 
      @else id="" @endif >{{$review->commentaire}}<p> 
      <span class="pull-right" style="margin-top: -20px;">{{$review->created_at->diffForHumans()}}</span>
      </fieldset>
  @endforeach
  


          @if(Auth::check())
            <div class="row" id="post-review-box" style="margin-top: 40px" >
                <div class="col-md-12">
                    <form accept-charset="UTF-8" action="{{url('annonce/'.$logement->id)}}" method="post">
                   {{ csrf_field() }}
                        
                        <textarea class="form-control" cols="50" id="new-review" name="commentaire" placeholder="Enter your review here..." rows="3"></textarea>
        
                        <div class="text-right">
                            <div class="stars starrr" data-rating="0"></div>
                            
                            <button class="btn btn-success btn-lg" type="submit">commenter</button>
                            
                        </div>
                    </form>
                </div>
            </div>
@endif
</div>
</div>
</div>
@endsection