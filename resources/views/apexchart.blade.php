@extends('layout.app')

@section('title', 'chart')

@section('page_name', 'Chart')

<!-- if the user login successfully, generate here his name -->
@section('loginName', '')

<!-- generate here his email -->
@section('loginEmail', '')

@section('main-container')

  <div class="card m-auto">
    <div class="card-body">
      <div class="row gy-5 g-xl-8">
        <div class="col-xl-12">

          <!-- apex chart code div here -->
          <div class="card card-bordered">
            <div class="card-body">
              <div id="kt_apexcharts_1" style="height: 350px; width: 900px"></div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
  
  <script src="{{ asset('js/apexcharts.js') }}"></script>

  <script>

    let element = document.getElementById('kt_apexcharts_1');
    let height = parseInt(KTUtil.css(element, 'height'));
    let labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
    let borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
    let baseColor = KTUtil.getCssVariableValue('--bs-primary');
    let secondaryColor = KTUtil.getCssVariableValue('--bs-gray-300');

    if (!element) {
      return;
    }

    var options = {
      series: [{
        name: 'Net Profit',
        data: [44, 55, 57, 56, 61, 58]
      }, {
        name: 'Revenue',
        data: [76, 85, 101, 98, 87, 105]
      }],
      chart: {
        fontFamily: 'inherit',
        type: 'bar',
        height: height,
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: ['30%'],
          endingShape: 'rounded'
        },
      },
      legend: {
        show: false
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '12px'
          }
        }
      },
      yaxis: {
        labels: {
          style: {
            colors: labelColor,
            fontSize: '12px'
          }
        }
      },
      fill: {
        opacity: 1
      },
      states: {
        normal: {
          filter: {
            type: 'none',
            value: 0
          }
        },
        hover: {
          filter: {
            type: 'none',
            value: 0
          }
        },
        active: {
          allowMultipleDataPointsSelection: false,
          filter: {
            type: 'none',
            value: 0
          }
        }
      },
      tooltip: {
        style: {
          fontSize: '12px'
        },
        y: {
          formatter: function (val) {
            return '$' + val + ' thousands'
          }
        }
      },
      colors: [baseColor, secondaryColor],
      grid: {
        borderColor: borderColor,
        strokeDashArray: 4,
        yaxis: {
          lines: {
            show: true
          }
        }
      }
    };

    let chart = new ApexCharts(element, options);
    chart.render();

  </script>

@endpush
