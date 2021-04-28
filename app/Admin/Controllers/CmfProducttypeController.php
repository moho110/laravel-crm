<?php

namespace App\Admin\Controllers;

use App\Models\CmfProducttype;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfProducttypeController extends AdminController {

	protected $title = "产品类型";

    public function index(Content $content)
    {
        return $content
            ->header('产品类型')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfProducttype());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('name', __('名称'));
                $grid->column('Code', __('代码'));
                $grid->column('viewtype', __('查收类型'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfProducttype());
                $form->text('name', __('名称'))
                ->creationRules('required|max:200|unique:cmf_producttype',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('ids', __('ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('Code', __('代码'))
                ->creationRules('required|max:200|integer',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('viewtype', __('查收类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('user_id', __('用户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('leverno', __('等级编码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('isbuyplan', __('是否购买计划'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('isautoout', __('是否自动出库'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('parentid', __('父级ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('产品类型');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('产品类型')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfProducttype());
        return $content
            ->header('产品类型')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfProducttype::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('name', __('名称'));
        $show->field('ids', __('ID'));
        $show->field('Code', __('代码'));
        $show->field('viewtype', __('查收类型'));
        $show->field('user_id', __('用户ID'));
        $show->field('user_flag', __('用户标识'));
        $show->field('leverno', __('等级编码'));
        $show->field('isbuyplan', __('是否购买计划'));
        $show->field('isautoout', __('是否自动出库'));
        $show->field('parentid', __('父级ID'));
        return $show;
        }
}

?>