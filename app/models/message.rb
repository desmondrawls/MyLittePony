class Message < ActiveRecord::Base
  attr_accessible :content, :outgoing, :heroine

  def self.create_from_text(params)
    body_array = params["Body"].split(":")
    message = self.new
    heroine = body_array[0].split.each(&:capitalize!).join(" ")
    content = body_array[1]
    chat = Message.where :heroine => heroine
    if body_array.count < 2 || !Pony.names.include?(heroine)
      Texter.correction(params["From"])
      message.assign_values("typo", body_array[1], false)
      message
    elsif chat.last && chat.last.outgoing
      message.assign_values(body_array[0], body_array[1], false)
      Texter.update(message)
      message
    else
      Texter.send_better_luck(params["From"])
      message.assign_values("late", body_array[1], false)
      message
    end
  end

  def assign_values(heroine, content, outgoing)
    self.heroine = heroine
    self.content = content
    self.outgoing = outgoing
    self.save()
  end
end
