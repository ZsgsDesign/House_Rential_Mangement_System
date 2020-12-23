<?php

namespace App\Admin\Controllers;

use App\Models\House;
use App\Models\Property;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class HouseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '房源';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new House());

        $grid->column('id', "编号");
        $grid->column('method', "出售方式")->display(function ($method) {
            return House::$method[$method];
        });
        $grid->column('area_name', "所属地区")->display(function () {
            return Property::find($this->property_id)->area->name;
        });
        $grid->column('property.address', "物业地址");
        $grid->column('property.name', "物业名称");
        $grid->column('building', "幢/座")->editable();
        $grid->column('floor', "楼层与房间")->editable();
        $grid->column('square_meter', "面积")->display(function ($square_meter) {
            return "{$square_meter}㎡";
        });
        $grid->column('type', '房型')->display(function () {
            return "{$this->bedrooms}室{$this->livingrooms}厅{$this->bathrooms}卫{$this->balconines}阳台";
        });
        $grid->column('sell_price', "售价")->display(function ($price) {
            return "￥$price";
        });
        $grid->column('rent_price', "租金/月")->display(function ($price) {
            return "￥$price";
        });
        $grid->column('parsed_status', "当前状态")->display(function () {
            return $this->parsed_status;
        });
        $grid->column('note', "备注")->editable('textarea');
        $grid->column('created_at', "创建日期");
        $grid->column('updated_at', "更新日期");

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(House::findOrFail($id));

        $show->field('id', "编号");
        $show->field('method', "出售方式")->as(function ($method) {
            return House::$method[$method];
        });
        $show->field('area_name', "所属地区")->as(function () {
            return Property::find($this->property_id)->area->name;
        });
        $show->field('property.address', "物业地址");
        $show->field('property.name', "物业名称");
        $show->field('地理位置')->latlong('property_lat', 'property_lng', $height = 400, $zoom = 16);
        $show->field('building', "幢/座");
        $show->field('floor', "楼层与房间");
        $show->field('square_meter', "面积")->as(function ($square_meter) {
            return "{$square_meter}㎡";
        });
        $show->field('type', '房型')->as(function () {
            return "{$this->bedrooms}室{$this->livingrooms}厅{$this->bathrooms}卫{$this->balconines}阳台";
        });
        $show->field('sell_price', "售价")->as(function ($price) {
            return "￥$price";
        });
        $show->field('rent_price', "租金/月")->as(function ($price) {
            return "￥$price";
        });
        $show->field('parsed_status', "当前状态")->as(function () {
            return $this->parsed_status;
        });
        $show->field('note', "备注");
        $show->field('created_at', "创建日期");
        $show->field('updated_at', "更新日期");

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new House());

            $form->select('method', "出售方式")->options(House::$method)->required();
            $form->select('property_id', "所属物业")->options(Property::all()->pluck('name', 'id'))->required();
            $form->text('building', "幢/座")->icon('fa-building')->required();
            $form->text('floor', "楼层与房间")->icon('fa-home')->required();
            $form->decimal('square_meter', "面积")->icon('fa-superscript')->required();

            $form->number('bedrooms', "室")->required();
            $form->number('livingrooms', "厅")->required();
            $form->number('bathrooms', "卫")->required();
            $form->number('balconines', "阳台")->required();

            $form->currency('sell_price', "售价")->symbol('￥')->required();
            $form->currency('rent_price', "租金/月")->symbol('￥')->required();
            $form->textarea('note', "备注")->required();

        return $form;
    }
}
