@push('styles')
<style>
   body{margin-top:20px;
background:#DCDCDC;
}
.pricing-content{position:relative;}
.pricing_design{
    position: relative;
    margin: 0px 15px;
}
.pricing_design .single-pricing{
    background:#554c86;
    padding: 60px 40px;
    border-radius:30px;
    box-shadow: 0 10px 40px -10px rgba(0,64,128,.2);
    position: relative;
    z-index: 1;
}
.pricing_design .single-pricing:before{
    content: "";
    background-color: #fff;
    width: 100%;
    height: 100%;
    border-radius: 18px 18px 190px 18px;
    border: 1px solid #eee;
    position: absolute;
    bottom: 0;
    right: 0;
    z-index: -1;
}
.price-head{}
.price-head h2 {
	margin-bottom: 20px;
	font-size: 26px;
	font-weight: 600;
}
.price-head h1 {
	font-weight: 600;
	margin-top: 30px;
	margin-bottom: 5px;
}
.price-head span{}

.single-pricing ul{list-style:none;margin-top: 30px;}
.single-pricing ul li {
	line-height: 36px;
}
.single-pricing ul li i {
	background: #554c86;
	color: #fff;
	width: 20px;
	height: 20px;
	border-radius: 30px;
	font-size: 11px;
	text-align: center;
	line-height: 20px;
	margin-right: 6px;
}
.pricing-price{}

.price_btn {
	background: #554c86;
	padding: 10px 30px;
	color: #fff;
	display: inline-block;
	margin-top: 20px;
	border-radius: 2px;
	-webkit-transition: 0.3s;
	transition: 0.3s;
}
.price_btn:hover{background:#0aa1d6;}
a{
text-decoration:none;    
}

.section-title {
    margin-bottom: 60px;
}
.text-center {
    text-align: center!important;
}

.section-title h2 {
    font-size: 45px;
    font-weight: 600;
    margin-top: 0;
    position: relative;
    text-transform: capitalize;
}
</style>
@endpush

<div class="main-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 position-section">
            <div class="card card-stats bg-color">
                <div class="main-section-content">
                    <div class=" page-dashboard-forword">
                        <span class="pages">Pages</span>
                        <span class="forword">/</span>
                        <span class="pages-dashboard">Dashboard</span>
                    </div>
                    <div class="at-responsive">
                        <x-span class="account-content">Account Level: Gold</x-span>
                        <x-span class="account-content">Project Credit: 2 Remaining</x-span>
                        <x-span class="upgrade-A">Upgrade Account</x-span>
                    </div>
                </div>
                <div class="card-content">
                    <h3 class="card-title fs-2">Welcom To CopySnoop Panel</h3>
                </div>
            </div>
           
        </div>
        <div class="container mb-5 mt-5">
         
            <div class="row">
                @foreach($packages as $package)						
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="pricing_design">
                        <div class="single-pricing">
                            <div class="price-head">		
                                <h2>{{$package->name}}</h2>
                                <h1>${{ $package->price }}</h1>
                                <span>/ {{ $package->duration }} days</span>
                            </div>
                            <ul>
                                <li><b>PDF</b> {{ $package->files }}</li>
                                <li><b>Analysis</b> {{ $package->reviews_requested }}</li>
                                <li><b>Platform</b> {{ $package->platform }}</li>
                                <li>{!! $package->description !!}</li>
                                
                                
                            </ul>
                            <div class="pricing-price">
                                
                            </div>
                            <a href="#" class="price_btn">Subscribe Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
   

</div>