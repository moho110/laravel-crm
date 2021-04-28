<?php

namespace App\Admin\Controllers;

use App\Models\CmfHrmsExpenseType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHrmsExpenseTypeController extends AdminController {

	protected $title = "费用类型";

    public function index(Content $content)
    {
        return $content
            ->header('费用类型')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHrmsExpenseType());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('type', __('类型'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfHrmsExpenseType());
                $form->text('type', __('模块编号'))
                ->creationRules('required|max:200|unique:cmf_hrms_expense_type',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('费用类型');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('费用类型')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHrmsExpenseType());
        return $content
            ->header('费用类型')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHrmsExpenseType::findOrFail($id));

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