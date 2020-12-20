<?php

namespace App\Admin\Controllers;

use App\Models\Property;
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

        $grid->column('id', __('Id'));
        $grid->column('area_id', __('Area id'));
        $grid->column('address', __('Address'));
        $grid->column('name', __('Name'));
        $grid->column('lat', __('Lat'));
        $grid->column('lng', __('Lng'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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

        $show->field('id', __('Id'));
        $show->field('area_id', __('Area id'));
        $show->field('address', __('Address'));
        $show->field('name', __('Name'));
        $show->field('lat', __('Lat'));
        $show->field('lng', __('Lng'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

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

        $form->number('area_id', __('Area id'));
        $form->text('address', __('Address'));
        $form->text('name', __('Name'));
        $form->decimal('lat', __('Lat'));
        $form->decimal('lng', __('Lng'));

        return $form;
    }
}
