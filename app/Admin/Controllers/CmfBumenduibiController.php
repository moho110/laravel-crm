<?php

namespace App\Admin\Controllers;

use App\Models\CmfSellplanmain;
use App\Models\CmfSellplanmainDetail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfBumenduibiController extends AdminController {

	protected $title = "部门对比";

    public function index(Content $content)
    {
        return $content
            ->header('部门对比')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSellplanmain());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('huikuanjine', __('回款金额'));
                $grid->column('fahuojine', __('发货金额'));
                $grid->column('kaipiaojine', __('开票金额'));
                $grid->column('prodid', __('产品编号'))->display(function (){
                    return $this->CmfSellplanmainDetail['prodid'];});
                $grid->column('prodname', __('产品名称'))->display(function (){
                    return $this->CmfSellplanmainDetail['prodname'];});
                $grid->column('prodxinghao', __('产品型号'))->display(function (){
                    return $this->CmfSellplanmainDetail['prodxinghao'];});
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('部门对比')
            ->description('详情')
            ->body($this->detail($id));
        }

        protected function detail($id)
        {
            $show = new Show(CmfSellplanmain::findOrFail($id));
            $show->field('id', __('编号'));
            $show->field('huikuanjine', __('回款金额'));
            $show->field('prodid', __('产品编号'))->as(function ($CmfSellplanmainDetail) {
                return $this->CmfSellplanmainDetail['prodid'];
            });
            $show->field('prodname', __('产品名称'))->as(function ($CmfSellplanmainDetail) {
                return $this->CmfSellplanmainDetail['prodname'];
            });
            $show->field('prodxinghao', __('产品型号'))->as(function ($CmfSellplanmainDetail) {
                return $this->CmfSellplanmainDetail['prodxinghao'];
            });
            return $show;
        }
}

?>