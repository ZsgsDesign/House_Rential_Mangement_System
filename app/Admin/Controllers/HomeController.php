<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use App\Models\Area;
use App\Models\Consumer;
use App\Models\House;
use App\Models\Property;
use App\Models\Purchase;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('仪表盘')
            ->description('这里是管理系统的系统运行状态区')
            ->row(view('admin.dashboard.title'))
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $envs=[
                        ['name' => '地区总数', 'value' => Area::count()],
                        ['name' => '物业总数', 'value' => Property::count()],
                        ['name' => '房源总数', 'value' => House::count()],
                        ['name' => '客户总数', 'value' => Consumer::count()],
                        ['name' => '订单总数', 'value' => Purchase::count()],
                    ];
                    $column->append(view('admin.dashboard.stat', compact('envs')));
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }
}
