# encoding: UTF-8
# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# Note that this schema.rb definition is the authoritative source for your
# database schema. If you need to create the application database on another
# system, you should be using db:schema:load, not running all the migrations
# from scratch. The latter is a flawed and unsustainable approach (the more migrations
# you'll amass, the slower it'll run and the greater likelihood for issues).
#
# It's strongly recommended to check this file into your version control system.

ActiveRecord::Schema.define(:version => 20130825214344) do

  create_table "clothing_items", :force => true do |t|
    t.string   "dept"
    t.string   "name"
    t.string   "img_url"
    t.datetime "created_at", :null => false
    t.datetime "updated_at", :null => false
    t.string   "thumb_url"
  end

  create_table "messages", :force => true do |t|
    t.string   "content"
    t.datetime "created_at", :null => false
    t.datetime "updated_at", :null => false
    t.string   "heroine"
    t.boolean  "outgoing"
  end

  create_table "ponies", :force => true do |t|
    t.string   "name"
    t.boolean  "beautymarks"
    t.datetime "created_at",  :null => false
    t.datetime "updated_at",  :null => false
    t.string   "img_url"
  end

  create_table "pony_clothing_items", :force => true do |t|
    t.integer  "pony_id"
    t.integer  "clothing_item_id"
    t.datetime "created_at",       :null => false
    t.datetime "updated_at",       :null => false
  end

  create_table "settings", :force => true do |t|
    t.string   "name"
    t.string   "img_url"
    t.datetime "created_at",          :null => false
    t.datetime "updated_at",          :null => false
    t.boolean  "in_everfree"
    t.integer  "north"
    t.integer  "south"
    t.integer  "east"
    t.integer  "west"
    t.string   "pony_position_left"
    t.string   "pony_position_top"
    t.string   "pony_width"
    t.boolean  "pony_reversed"
    t.integer  "pony_id"
    t.boolean  "cameo_reversed"
    t.string   "cameo_position_left"
    t.string   "cameo_position_top"
    t.string   "cameo_width"
    t.boolean  "escape"
  end

end
