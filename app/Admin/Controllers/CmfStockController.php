<?php

namespace App\Admin\Controllers;

use App\Models\CmfStock;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfStockController extends AdminController {

	protected $title = "仓库管理";

    public function index(Content $content)
    {
        return $content
            ->header('仓库管理')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfStock());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('name', __('名称'));
                $grid->column('user_flag', __('用户标识'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfStock());
                $form->text('name', __('名称'))
                ->creationRules('required|max:200|unique:cmf_stock',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('id', __('ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('user_id', __('用户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('isClock', __('是否锁定'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('leverno', __('等级编号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('costtype', __('成本类型'))->options(['1' => '普通','0' => '特殊'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('仓库管理');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('仓库管理')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfStock());
        return $content
            ->header('仓库管理')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfStock::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('name', __('名称'));
        $show->field('id', __('ID'));
        $show->field('user_flag', __('用户标识'));
        $show->field('user_id', __('用户ID'));
        $show->field('isClock', __('是否锁定'));
        $show->field('leverno', __('等级编号'));
        $show->field('costtype', __('成本类型'));
        return $show;
        }
}

?>