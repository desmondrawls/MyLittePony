class Setting < ActiveRecord::Base
  attr_accessible :name, :img_url, :in_everfree, :north, :south, :east, :west, :pony_position_left, :pony_position_top, :pony_width, :pony_reversed, :pony_id, :cameo_reversed, :cameo_position_left, :cameo_position_top, :cameo_width, :escape
  # pony_id refers to the cameo pony that is already on the scene when the heroine pony arrives

  has_one :pony
end