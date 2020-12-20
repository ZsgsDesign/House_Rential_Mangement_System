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
    protected $title = '物业';

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
        $grid->column('address', "物业地址")->editable();
        $grid->column('name', "物业名称")->editable();
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
        $show->field('地理位置')->latlong('lat', 'lng', $height = 400, $zoom = 16);
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

        $form->select('area_id', "所在地区")->options(Area::all()->pluck('name', 'id'))->required();
        $form->text('address', "物业地址")->icon('fa-road')->required();
        $form->text('name', "物业名称")->icon('fa-institution')->required();
        $form->latlong('lat', 'lng', '地理位置')->required();

        return $form;
    }
}
