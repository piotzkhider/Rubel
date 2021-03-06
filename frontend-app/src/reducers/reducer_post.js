import marked from "marked"
import hljs from "highlight.js"

import { FETCH_POSTS, FETCH_POST, FETCH_INIT_POST, UPDATE_MARKDOWN, INIT_MARKDOWN } from "../actions/index"

const INITIAL_STATE = {
	records: [],
	pagination: [],
	post: null,
	init_post: null,
	markdown: null
}

export default function(state = INITIAL_STATE, action) {
	switch (action.type) {
	case FETCH_POSTS:
		const original_data = action.payload.data

		const records = original_data.data
		const pagination = () => {
			delete original_data.data
			return original_data
		}

		return {
			...state,
			records: records,
			pagination: pagination()
		}

	case FETCH_POST:
		return {
			...state,
			post: action.payload.data
		}

	case FETCH_INIT_POST:
		return {
			...state,
			init_post: {
				id: action.payload.data.id,
				category_id: action.payload.data.category.id,
				title: action.payload.data.title,
				md_content: action.payload.data.md_content,
				publication_status: action.payload.data.publication_status,
				tags: action.payload.data.tags
			}
		}

	case UPDATE_MARKDOWN:
		const marked_request = marked.setOptions({
			breaks: true,
			sanitize: true,
			highlight: function(code, lang) {
				return hljs.highlightAuto(code, [lang]).value
			}
		})

		let html = marked(action.payload)

		html = html.replace(/\[x\]/g, "<input type=\"checkbox\" checked=\"checked\">")
		html = html.replace(/\[ \]/g, "<input type=\"checkbox\">")

		return {
			...state,
			markdown: html
		}

	case INIT_MARKDOWN:
		return {
			...state,
			markdown: null
		}

	default:
		return state
	}
}
