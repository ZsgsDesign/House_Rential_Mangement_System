<?php

namespace App\Admin\Controllers;

use App\Models\Consumer;
use App\Models\House;
use App\Models\Purchase;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PurchaseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '订单';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Purchase());

        $grid->column('id', "编号");
        $grid->column('consumer_name', "客户")->display(function () {
            return $this->consumer->full_name;
        });
        $grid->column('house_readable_name', "房源")->display(function () {
            return $this->house->readable_name;
        });
        $grid->column('started_at', "生效日期");
        $grid->column('ended_at', "结束日期");
        $grid->column('sell_type', "出售方式")->display(function ($sell_type) {
            return Purchase::$type[$sell_type];
        });
        $grid->column('price', "成交价格")->display(function ($price) {
            return "￥$price";
        });
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
        $show = new Show(Purchase::findOrFail($id));

        $show->field('id', "编号");
        $show->field('consumer_name', "客户")->as(function () {
            return $this->consumer->full_name;
        });
        $show->field('house_readable_name', "房源")->as(function () {
            return $this->house->readable_name;
        });
        $show->field('started_at', "生效日期");
        $show->field('ended_at', "结束日期");
        $show->field('sell_type', "出售方式")->as(function ($sell_type) {
            return Purchase::$type[$sell_type];
        });
        $show->field('price', "成交价格")->as(function ($price) {
            return "￥$price";
        });
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
        $form = new Form(new Purchase());
        if ($form->isCreating()) {
            $form->select('consumer_id', "客户")->options(Consumer::all()->pluck('full_name', 'id'))->required();
            $form->select('house_id', "购买房源")->options(House::purchasable()->pluck('readable_name', 'id'))->required();
        }
        $form->datetime('started_at', "生效日期");
        $form->datetime('ended_at', "结束日期");
        $form->select('sell_type', "出售方式")->options(Purchase::$type)->required();
        $form->currency('price', "成交价格")->symbol('￥')->required();

        return $form;
    }
}
