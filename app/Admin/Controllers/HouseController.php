<?php

namespace App\Admin\Controllers;

use App\Models\House;
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
    protected $title = 'House';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new House());

        $grid->column('id', __('Id'));
        $grid->column('method', __('Method'));
        $grid->column('building', __('Building'));
        $grid->column('property_id', __('Property id'));
        $grid->column('lat', __('Lat'));
        $grid->column('lng', __('Lng'));
        $grid->column('floor', __('Floor'));
        $grid->column('square_meter', __('Square meter'));
        $grid->column('bedrooms', __('Bedrooms'));
        $grid->column('livingrooms', __('Livingrooms'));
        $grid->column('bathrooms', __('Bathrooms'));
        $grid->column('balconines', __('Balconines'));
        $grid->column('sell_price', __('Sell price'));
        $grid->column('rent_price', __('Rent price'));
        $grid->column('status', __('Status'));
        $grid->column('note', __('Note'));
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
        $show = new Show(House::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('method', __('Method'));
        $show->field('building', __('Building'));
        $show->field('property_id', __('Property id'));
        $show->field('lat', __('Lat'));
        $show->field('lng', __('Lng'));
        $show->field('floor', __('Floor'));
        $show->field('square_meter', __('Square meter'));
        $show->field('bedrooms', __('Bedrooms'));
        $show->field('livingrooms', __('Livingrooms'));
        $show->field('bathrooms', __('Bathrooms'));
        $show->field('balconines', __('Balconines'));
        $show->field('sell_price', __('Sell price'));
        $show->field('rent_price', __('Rent price'));
        $show->field('status', __('Status'));
        $show->field('note', __('Note'));
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
        $form = new Form(new House());

        $form->switch('method', __('Method'));
        $form->textarea('building', __('Building'));
        $form->number('property_id', __('Property id'));
        $form->decimal('lat', __('Lat'));
        $form->decimal('lng', __('Lng'));
        $form->textarea('floor', __('Floor'));
        $form->textarea('square_meter', __('Square meter'));
        $form->number('bedrooms', __('Bedrooms'));
        $form->number('livingrooms', __('Livingrooms'));
        $form->number('bathrooms', __('Bathrooms'));
        $form->number('balconines', __('Balconines'));
        $form->textarea('sell_price', __('Sell price'));
        $form->textarea('rent_price', __('Rent price'));
        $form->switch('status', __('Status'));
        $form->textarea('note', __('Note'));

        return $form;
    }
}
