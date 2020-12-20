<?php

namespace App\Admin\Controllers;

use App\Models\Area;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AreaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '地区';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Area());

        $grid->column('id', "编号");
        $grid->column('name', "名称");
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
        $show = new Show(Area::findOrFail($id));

        $show->field('id', "编号");
        $show->field('name', "名称");
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
        $form = new Form(new Area());

        $form->text('name', "名称");

        return $form;
    }
}
