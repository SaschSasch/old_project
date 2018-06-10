;
'use strict';

(function (window) {
	'use strict';
	
	class TreeViewService {
		constructor(onNodeChecked) {
			this.checked = [];
			this.tree = [];
			this.self = null;
			this.state = {
				checked: false,
				disabled: false,
				expanded: false,
				selected: false
			};

			this.defaultOpts = {
				bootstrap2: false,
				showTags: true,
				levels: 10,
				highlightSelected: false,
				multiSelect: true,
				showCheckbox: true,
				onNodeChecked: (event, data) => {
					const ind = this.checked.indexOf(data.id);
					if (ind === -1)
						this.checked.push(data.id);
					try {
						onNodeChecked(true, this);
					} catch (e) {
						console.error('not defined callback onNodeChecked', e);
					}
				},
				onNodeUnchecked: (event, data) => {
					const ind = this.checked.indexOf(data.id);
					if (ind !== -1)
						this.checked.pop(ind);
					try {
						onNodeChecked(false, this);
					} catch (e) {
						console.error('not defined callback onNodeChecked', e);
					}
				},
				data: this.tree
			};
		}

		get Checked() {
			return this.checked;
		}

		clearChecked() {
			this.checked = [];
		}
		
		setNodesState(preState) {
			this.state = Object.assign({}, this.state, preState);
			return this;
		}

		getOpts(preOpts) {
			return Object.assign({}, this.defaultOpts, preOpts);
		}

		setTree(data, parent, selected, first) {
			this.tree = this.getTree(data, parent, selected, first);
			this.clearEmptyNodeChilds();
			this.defaultOpts.data = this.tree;
		}

		getTree(array, parent, selected = null, first = true) {
			let ids = array.map(x => x.id).filter((v, i, s) => s.indexOf(v) === i);
			let parents = array.map(x => x.parent).filter((v, i, s) => s.indexOf(v) === i);
			let out = array
			.filter(el => {
				if (first) {
					const cond = parents.includes(el.id) && !ids.includes(el.parent);
					if (cond) return true;
				}
				return el.parent === parent;
			})
			.map((root) => {
				const { id, name } = root;
				// console.log(`el ${id} is leaf for ${parent}`);
				return {
					id,
					text: name,
					backColor: id === selected ? '#ede8ff9e' : '', 
					color: id === selected ? '#0e0e0e' : '',
					state: this.state,
					nodes: this.getTree(array, id, selected, false),
				};
			});
			return out;
		}

		clearEmptyNodeChilds(array) {
			array = array || this.tree;
			array.forEach(value => {
				if (value.nodes.length !== 0) {
					this.clearEmptyNodeChilds(value.nodes)
				} else {
					delete value.nodes;
				}
			});
		}
	};
	window.TreeViewService = TreeViewService;
})(window);