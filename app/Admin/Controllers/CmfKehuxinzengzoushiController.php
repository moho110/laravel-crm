<?php

namespace App\Admin\Controllers;

use App\Models\CmfCustomer;
use App\Models\CmfCustomerarea;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfKehuxinzengzoushiController extends AdminController {

	protected $title = "客户新增走势";

    public function index(Content $content)
    {
        return $content
            ->header('客户新增走势')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCustomer());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('supplyid', __('供应商编码'));
                $grid->column('supplyname', __('供应商名称'));
                $grid->column('supplyshortname', __('供应商简称'));
                $grid->column('postalcode', __('邮政编码'));
                $grid->column('phone', '电话号码');
                $grid->column('name', __('名称'))->display(function (){
                    return $this->CmfCustomerarea['name'];});
                $grid->column('leverno', __('等级编号'))->display(function (){
                    return $this->CmfCustomerarea['leverno'];});
                $grid->paginate(10);

                return $grid;
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('客户新增走势')
            ->description('详情')
            ->body($this->detail($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCustomer::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('supplyid', __('供应商编码'));
        $show->field('supplyname', __('供应商名称'));
        $show->field('supplyshortname', __('供应商简称'));
        $show->field('postalcode', __('邮政编码'));
        $show->field('phone', __('电话号码'));
        $show->field('name', __('名称'))->as(function ($CmfCustomerarea) {
                return $this->CmfCustomerarea['name'];
            });
            $show->field('leverno', __('等级编号'))->as(function ($CmfCustomerarea) {
                return $this->CmfCustomerarea['leverno'];
            });
        return $show;
        }
}

?>