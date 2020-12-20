<?php

namespace App\Admin\Controllers;

use App\Models\Property;
use App\Models\Area;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PropertyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Property';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Property());

        $grid->column('id', "编号");
        $grid->column('area.name', "所属地区");
        $grid->column('address', "物业地址");
        $grid->column('name', "物业名称");
        // $grid->column('lat', "纬度");
        // $grid->column('lng', "经度");
        $grid->column('created_at', "创建日期");
        $grid->column('updated_at', "更新日期");

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('address', '物业地址');
            $filter->like('name', '物业名称');
        });
        $grid->expandFilter();

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
        $show = new Show(Property::findOrFail($id));

        $show->field('id', "编号");
        $show->field('area.name', "所属地区");
        $show->field('address', "物业地址");
        $show->field('name', "物业名称");
        $show->field('lat', "纬度");
        $show->field('lng', "经度");
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
        $form = new Form(new Property());

        $form->select('area_id', "所在地区")->options(Area::all()->pluck('name', 'id'));
        $form->text('address', "物业地址");
        $form->text('name', "物业名称");
        $form->decimal('lat', "纬度");
        $form->decimal('lng', "经度");

        return $form;
    }
}
