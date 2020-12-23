<?php

namespace App\Admin\Controllers;

use App\Models\Consumer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ConsumerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '客户';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Consumer());

        $grid->column('id', "编号");
        $grid->column('full_name', '姓名')->display(function () {
            return $this->full_name;
        });
        $grid->column('gender', "性别")->display(function ($gender) {
            return Consumer::$gender[$gender];
        });
        $grid->column('email', "电子邮件");
        $grid->column('tel', "电话号码");
        $grid->column('note', "备注")->editable();
        $grid->column('created_at', "创建日期");
        $grid->column('updated_at', "更新日期");

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('first_name', '名');
            $filter->like('last_name', '姓');
            $filter->equal('gender', "性别")->radio([
                ''   => '不限',
                0    => '男',
                1    => '女',
            ]);
            $filter->like('email', '电子邮件');
            $filter->like('tel', '电话号码');
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
        $show = new Show(Consumer::findOrFail($id));

        $show->field('id', "编号");
        $show->field('first_name', "名");
        $show->field('last_name', "姓");
        $show->field('gender', "性别")->as(function ($gender) {
            return Consumer::$gender[$gender];
        });
        $show->field('email', "电子邮件");
        $show->field('tel', "电话号码");
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
        $form = new Form(new Consumer());

        $form->text('first_name', "名")->required();
        $form->text('last_name', "姓")->required();
        $form->select('gender', "性别")->options(Consumer::$gender)->required();
        $form->email('email', "电子邮件");
        $form->mobile('tel', "电话号码");
        $form->textarea('note', "备注");

        return $form;
    }
}
