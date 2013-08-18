class Message < ActiveRecord::Base
  attr_accessible :content

  def self.create_from_text(params)
    message = self.new
    message.content = params["Body"]
    message.save()
    message
  end

end
