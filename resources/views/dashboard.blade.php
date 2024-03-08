<x-user-layout>
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
                {{-- <div class="card-footer ">
                     <div class="row">
                        <div class="col-md-4">
                            <div class="card h-20">
                                <h1 class="card-title text-center text-gray-950">Total Words</h1>
                                <div class="card-body">
                                         {{ Auth::user()->max_words }}
                                </div>
                             </div>
                             
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <h1 class="card-title text-center text-gray-950">Total PDF's</h1>
                                <div class="card-body">
                                         {{ Auth::user()->max_words }}
                                </div>
                             </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <h1 class="card-title text-center text-gray-950">Remaining Words</h1>
                                <div class="card-body">
                                         {{ Auth::user()->max_words }}
                                </div>
                             </div>
                        </div>
                     </div>
                </div> --}}
            </div>


            <div class="container my-6 top-at-mbl " style="margin-top: 90px; margin-bottom: 40px;">
             
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                           
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="12">
                                          <div class="d-flex justify-content-center py-5">
                                            <img src="{{ asset('assets/images/sorry.svg') }}" style="height: 150px;width:150px;" alt="">
                                          </div>
                                          <p class="text-center">No Record Found...</p>
                                    </td>
                                </tr>
                            </tbody>
                          </table>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-user-layout>