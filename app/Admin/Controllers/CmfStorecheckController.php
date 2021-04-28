<?php

namespace App\Admin\Controllers;

use App\Models\CmfStorecheck;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfStorecheckController extends AdminController {

	protected $title = "库存盘点";

    public function index(Content $content)
    {
        return $content
            ->header('库存盘点')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfStorecheck());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('zhuti', __('主题'));
                $grid->column('storeid', __('库存ID'));
                $grid->column('totalmoney', __('总金额'));
                $grid->column('state', __('状态'));
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfStorecheck());
                $form->text('zhuti', __('主题'))
                ->creationRules('required|max:200|unique:cmf_storecheck',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('storeid', __('库存ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('totalmoney', __('总金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('state', __('状态'))->options(['1' => '良好','0' => '一般'])
                ->rules('required');
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('库存盘点');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('库存盘点')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfStorecheck());
        return $content
            ->header('库存盘点')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfStorecheck::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('zhuti', __('主题'));
        $show->field('storeid', __('库存ID'));
        $show->field('totalmoney', __('总金额'));
        $show->field('state', __('状态'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        $show->field('memo', __('备注'));
        return $show;
        }
}

?>