<?php

namespace App\Admin\Controllers;

use App\Models\CmfCustomer;
use App\Models\CmfCrmCustomerMove;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCrmCustomerMoveController extends AdminController {

	protected $title = "客户移除";

    public function index(Content $content)
    {
        return $content
            ->header('客户移除')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCrmCustomerMove());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('clientId', __('客户ID'));
                $grid->column('operator', __('操作员'));
                $grid->column('operateTime', __('操作时间'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCrmCustomerMove());
                $form->select('clientId', __('客户ID'))
                ->options(CmfCustomer::pluck('supplyname','id'))
                ->creationRules('required|max:200|unique:cmf_crm_customer_move',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('preUser', __('上一次用户'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('nextUser', __('下一次用户'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('operator', __('操作员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('operateTime', __('操作时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('客户移除');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('客户移除')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCrmCustomerMove());
        return $content
            ->header('客户移除')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCrmCustomerMove::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('clientId', __('客户ID'));
        $show->field('preUser', __('上一次用户'));
        $show->field('nextUser', __('下一次用户'));
        $show->field('operator', __('操作员'));
        $show->field('operateTime', __('操作时间'));
        return $show;
        }
}

?>