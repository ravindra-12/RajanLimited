@extends('partial.dashboardlayout')

@section('title', 'Admin')

          @section('content')


          <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
            <!-- Stats -->
            <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4"> 
              <!-- Stat card 1 -->
             <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="p-5">
                  <div class="flex items-center">
                    <div class="flex-shrink-0">
                      <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                    </div>
                    <div class="flex-1 w-0 ml-5">
                      <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Revenue</dt>
                        <dd class="flex items-baseline">
                          <div class="text-2xl font-semibold text-gray-900">$45,231</div>
                          <div class="ml-2 text-sm font-semibold text-green-600">+20.1%</div>
                        </dd>
                      </dl>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Stat card 2 -->
              <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="p-5">
                  <div class="flex items-center">
                    <div class="flex-shrink-0">
                      <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                      </svg>
                    </div>
                    <div class="flex-1 w-0 ml-5">
                      <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">New Clients</dt>
                        <dd class="flex items-baseline">
                          <div class="text-2xl font-semibold text-gray-900">2,356</div>
                          <div class="ml-2 text-sm font-semibold text-green-600">+18.2%</div>
                        </dd>
                      </dl>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Stat card 3 -->
              <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="p-5">
                  <div class="flex items-center">
                    <div class="flex-shrink-0">
                      <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                      </svg>
                    </div>
                    <div class="flex-1 w-0 ml-5">
                      <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Tickets Closed</dt>
                        <dd class="flex items-baseline">
                          <div class="text-2xl font-semibold text-gray-900">1,245</div>
                          <div class="ml-2 text-sm font-semibold text-green-600">+5.3%</div>
                        </dd>
                      </dl>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Stat card 4 -->
              <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="p-5">
                  <div class="flex items-center">
                    <div class="flex-shrink-0">
                      <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                      </svg>
                    </div>
                    <div class="flex-1 w-0 ml-5">
                      <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Active Users</dt>
                        <dd class="flex items-baseline">
                          <div class="text-2xl font-semibold text-gray-900">573</div>
                          <div class="ml-2 text-sm font-semibold text-green-600">+12.5%</div>
                        </dd>
                      </dl>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Charts -->
            <div class="grid grid-cols-1 gap-5 mt-6 lg:grid-cols-2">
              <!-- Chart 1 -->
              <div class="p-4 bg-white rounded-lg shadow sm:p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Revenue Overview</h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">Monthly revenue for the current year</p>
                </div>
                <div class="w-full h-64 mt-5 bg-gray-50 rounded flex items-center justify-center text-gray-400">
                  Chart Placeholder
                </div>
              </div>

              <!-- Chart 2 -->
              <div class="p-4 bg-white rounded-lg shadow sm:p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">User Activity</h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">Daily active users over time</p>
                </div>
                <div class="w-full h-64 mt-5 bg-gray-50 rounded flex items-center justify-center text-gray-400">
                  Chart Placeholder
                </div>
              </div>
            </div>

            <!-- Recent Activity -->
            <div class="mt-6">
              <div class="overflow-hidden bg-white shadow sm:rounded-md">
                <div class="px-4 py-5 sm:px-6">
                  <h3 class="text-lg font-medium leading-6 text-gray-900">Recent Activity</h3>
                  <p class="mt-1 text-sm text-gray-500">Latest transactions and updates</p>
                </div>
                <ul class="divide-y divide-gray-200">
                  <li>
                    <div class="px-4 py-4 sm:px-6">
                      <div class="flex items-center justify-between">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                            <span class="text-sm font-medium text-gray-700">JD</span>
                          </div>
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">John Doe</div>
                            <div class="text-sm text-gray-500">john.doe@example.com</div>
                          </div>
                        </div>
                        <div class="ml-2 flex-shrink-0 flex">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Completed
                          </span>
                        </div>
                      </div>
                      <div class="mt-2 sm:flex sm:justify-between">
                        <div class="sm:flex">
                          <div class="flex items-center text-sm text-gray-500">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Completed on <time datetime="2023-01-15">January 15, 2023</time></span>
                          </div>
                        </div>
                        <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                          <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                          </svg>
                          <span>$1,250.00 USD</span>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="px-4 py-4 sm:px-6">
                      <div class="flex items-center justify-between">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                            <span class="text-sm font-medium text-gray-700">JS</span>
                          </div>
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">Jane Smith</div>
                            <div class="text-sm text-gray-500">jane.smith@example.com</div>
                          </div>
                        </div>
                        <div class="ml-2 flex-shrink-0 flex">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            Pending
                          </span>
                        </div>
                      </div>
                      <div class="mt-2 sm:flex sm:justify-between">
                        <div class="sm:flex">
                          <div class="flex items-center text-sm text-gray-500">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Started on <time datetime="2023-01-12">January 12, 2023</time></span>
                          </div>
                        </div>
                        <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                          <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                          </svg>
                          <span>$750.00 USD</span>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="px-4 py-4 sm:px-6">
                      <div class="flex items-center justify-between">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                            <span class="text-sm font-medium text-gray-700">RJ</span>
                          </div>
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">Robert Johnson</div>
                            <div class="text-sm text-gray-500">robert.johnson@example.com</div>
                          </div>
                        </div>
                        <div class="ml-2 flex-shrink-0 flex">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Cancelled
                          </span>
                        </div>
                      </div>
                      <div class="mt-2 sm:flex sm:justify-between">
                        <div class="sm:flex">
                          <div class="flex items-center text-sm text-gray-500">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Cancelled on <time datetime="2023-01-10">January 10, 2023</time></span>
                          </div>
                        </div>
                        <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                          <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                          </svg>
                          <span>$500.00 USD</span>
                        </div>
                      </div>
                    </div>
                  {{-- {{-- </li> --}}
                </ul>
              {{-- </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div> --}} 
  @endsection

 
