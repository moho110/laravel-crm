<?php

namespace App\Admin\Controllers;

use App\Models\CmfSysFunction;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSysFunctionController extends AdminController {

	protected $title = "我的桌面";

    public function index(Content $content)
    {
        return $content
            ->header('我的桌面')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSysFunction());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('MENU_ID', __('菜单ID'));
                $grid->column('FUNC_NAME', __('菜单名称'));
                $grid->column('FUNC_CODE', __('功能代码'));
                $grid->column('FUNC_LINK', __('功能链接'));
                $grid->column('ENGLISHNAME', '英文名称');
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSysFunction());
                $form->number('moduleId', __('模块编号'))
                ->creationRules('required|max:2|unique:cmf_crm_mytable',
                        ['requied' => '此项不能为空','max' =>'不能大于2个字符','unique' => '数据已经存在']);
                $form->text('moduleName', __('模块名称'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('modulePosition', __('模块位置'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('moduleAttr', __('模块属性'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('displayLineNumber', __('显示行号'))
                ->creationRules('required|max:2|unique:cmf_crm_mytable',
                        ['requied' => '此项不能为空','max' =>'不能大于2个字符','unique' => '数据已经存在']);
                $form->radio('scrollDisplay', __('是否滚动显示'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('我的桌面');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('我的桌面')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSysFunction());
        return $content
            ->header('我的桌面')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSysFunction::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('moduleId', __('模块编号'));
        $show->field('moduleName', __('模块名称'));
        $show->field('modulePosition', __('模块位置'));
        $show->field('moduleAttr', __('模块属性'));
        $show->field('displayLineNumber', __('显示行号'));
        $show->field('scrollDisplay', __('是否滚动显示'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('memo', __('备注'));
        return $show;
        }
}

?>